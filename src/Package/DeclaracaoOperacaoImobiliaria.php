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
        $currentPos = count($this->operacoes);

        $this->operacoes[$currentPos]['operacao'] = $operacao;
        $this->operacoes[$currentPos]['alienantes'] = [];
        $this->operacoes[$currentPos]['adquirentes'] = [];

        return $currentPos;
    }

    public function pushAlienante(int $operacao, Alienante $alienante)
    {
        if (!isset($this->operacoes[$operacao])) {
            throw new RuntimeException("Undefined operation '{$operacao}' in DOI");
        }

        $this->operacoes[$operacao]['alienantes'][] = $alienante;

        return $this;
    }

    public function pushAdquirente(int $operacao, Adquirente $adquirente)
    {
        if (!isset($this->operacoes[$operacao])) {
            throw new RuntimeException("Undefined operation '{$operacao}' in DOI");
        }

        $this->operacoes[$operacao]['adquirentes'][] = $adquirente;

        return $this;
    }

    public function setControle(Controle $controle)
    {
        $this->controle = $controle;

        return $this;
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
