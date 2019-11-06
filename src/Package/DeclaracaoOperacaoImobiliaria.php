<?php

namespace DOIWeb\Package;

use DOIWeb\Compatibility\DOI6Serializable;
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

    public function isValidDOI($regCounter)
    {
        // check $regCounter with controle['campo_controle']
        return true;
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
}
