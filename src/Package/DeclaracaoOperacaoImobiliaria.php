<?php

namespace DOIWeb\Package;

use DOIWeb\Compatibility\DOI6Serializable;
use DOIWeb\Fields\FieldFactory;
use JsonSerializable;
use RuntimeException;

/**
 * Class DeclaracaoOperacaoImobiliaria
 * @author yourname
 */
class DeclaracaoOperacaoImobiliaria implements JsonSerializable, DOI6Serializable
{
    protected $operacoes = [];
    protected $controle;
    protected $currentPos = 0;

    public function getCurrentPosition()
    {
        return $this->currentPos;
    }

    public function getOperacoes()
    {
        return $this->operacoes;
    }

    public function getControle()
    {
        return $this->controle;
    }

    public function pushOperacao(Operacao $operacao)
    {
        $this->currentPos = count($this->operacoes);

        $this->operacoes[$this->currentPos]['operacao'] = $operacao;
        $this->operacoes[$this->currentPos]['alienantes'] = [];
        $this->operacoes[$this->currentPos]['participacao_alienante'] = 0.0;
        $this->operacoes[$this->currentPos]['adquirentes'] = [];
        $this->operacoes[$this->currentPos]['participacao_adquirente'] = 0.0;
        $this->operacoes[$this->currentPos]['status'] = false;
        $this->operacoes[$this->currentPos]['alerts'] = [];

        return $this->currentPos;
    }

    public function pushAlienante(int $operacao, Alienante $alienante)
    {
        if (!isset($this->operacoes[$operacao])) {
            throw new RuntimeException("Undefined operation '{$operacao}' in DOI");
        }

        $this->operacoes[$operacao]['alienantes'][] = $alienante;

        $value = $alienante->participacao ? str_replace(',', '.', $alienante->participacao) : 0;
        $this->operacoes[$operacao]['participacao_alienante'] += $value;

        return $this;
    }

    public function pushAdquirente(int $operacao, Adquirente $adquirente)
    {
        if (!isset($this->operacoes[$operacao])) {
            throw new RuntimeException("Undefined operation '{$operacao}' in DOI");
        }

        $this->operacoes[$operacao]['adquirentes'][] = $adquirente;

        $value = $adquirente->participacao ? str_replace(',', '.', $adquirente->participacao) : 0;
        $this->operacoes[$operacao]['participacao_adquirente'] += $value;

        return $this;
    }

    public function setControle(Controle $controle)
    {
        $this->validateOperacoes();

        $this->controle = $controle;

        return $this;
    }

    protected function validateOperacoes()
    {
        $epsilon = 0.0005;

        foreach ($this->operacoes as &$operacaoArr) {
            $status = true;

            $operacao = $operacaoArr['operacao'];
            $totalAlienante = $operacaoArr['participacao_alienante'];
            $totalAdquirente = $operacaoArr['participacao_adquirente'];

            if (!$operacaoArr['alienantes']) {
                $operacaoArr['alerts'][] = "Não foi informado nenhum alienante";
                $status = false;
            } else if (($totalAlienante - $epsilon) < 0) {
                $operacaoArr['alerts'][] = "Possível falha na participação do(s) alienante(s)";
                $status = false;
            } else if (round($totalAlienante) > 100) {
                $operacaoArr['alerts'][] = "Participação do(s) alienante(s) é maior que 100% ({$totalAlienante})";
                $status = false;
            }

            if (!$operacaoArr['adquirentes']) {
                $operacaoArr['alerts'][] = "Não foi informado nenhum adquirente";
                $status = false;
            } else if (($totalAdquirente - $epsilon) < 0) {
                $operacaoArr['alerts'][] = "Possível falha na participação do(s) adquirente(s)";
                $status = false;
            } else if (round($totalAdquirente) > 100) {
                $operacaoArr['alerts'][] = "Participação do(s) adquirente(s) é maior que 100% ({$totalAdquirente})";
                $status = false;
            }

            $a = $totalAdquirente;
            $b = $totalAlienante;

            if ($a > $b) {
                $t = $b;
                $b = $a;
                $a = $t;
            }

            $totalDiff = $b - $a;

            if (($totalDiff - $epsilon) > 0) {
                $operacaoArr['alerts'][] = "Participação de adquirente(s) (${totalAdquirente}%) e alienante(s) (${totalAlienante}%) são diferentes";
                $status = false;
            }

            $operacaoArr['status'] = $status;
        }
    }

    public function jsonSerialize()
    {
        return [
            'operacoes' => $this->getOperacoes(),
            'controle' => $this->getControle(),
        ];
    }

    public function serializeDOI6($validateChecksum = false)
    {
        $doi = "";

        foreach ($this->getOperacoes() as $entry) {
            $operacao = $entry['operacao'];
            $doi .= $operacao->serializeDOI6($validateChecksum);

            foreach ($entry['alienantes'] as $alienante) {
                $doi .= $alienante->serializeDOI6($validateChecksum);
            }

            foreach ($entry['adquirentes'] as $adquirente) {
                $doi .= $adquirente->serializeDOI6($validateChecksum);
            }
        }

        $doi .= $this->getControle()->serializeDOI6($validateChecksum);

        return $doi;
    }

    public function fromJson($filepath)
    {
        if (!file_exists($filepath)) {
            return false;
        }

        $data = json_decode(file_get_contents($filepath), true);

        if (json_last_error()) {
            return false;
        } else if (!isset($data['operacoes']) && !isset($data['controle'])) {
            return false;
        }

        foreach ($data['operacoes'] as $operacaoEntry) {
            $currentPos = $this->pushOperacao(
                $this->createOperacao($operacaoEntry['operacao'])
            );

            foreach ($operacaoEntry['alienantes'] as $entry) {
                $this->pushAlienante($currentPos, $this->createAlienante($entry));
            }

            foreach ($operacaoEntry['adquirentes'] as $entry) {
                $this->pushAdquirente($currentPos, $this->createAdquirente($entry));
            }
        }

        $this->setControle($this->createControle($data['controle']));
    }

    protected function updateSection(TipoRegistroAbstract $section, array $fields)
    {
        foreach ($fields as $field) {
            $key = key($field);
            $value = $field[$key];

            if (is_array($value)) {
                $section->pushField(
                    FieldFactory::create($key, ' ', $value['start_position'], $value['length'])
                );

                continue;
            }

            $section->pushField(FieldFactory::create($key, $value));
        }
    }

    protected function createOperacao(array $data)
    {
        $section = new Operacao();

        $this->updateSection($section, $data['fields']);

        return $section;
    }

    protected function createAlienante(array $data)
    {
        $section = new Alienante();

        $this->updateSection($section, $data['fields']);

        return $section;
    }

    protected function createAdquirente(array $data)
    {
        $section = new Adquirente();

        $this->updateSection($section, $data['fields']);

        return $section;
    }

    protected function createControle(array $data)
    {
        $section = new Controle();

        $this->updateSection($section, $data['fields']);

        return $section;
    }
}
