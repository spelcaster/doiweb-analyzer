<?php

namespace DOIWeb\Package;

use DOIWeb\Compatibility\DOI6Serializable;
use JsonSerializable;
use DOIWeb\Fields\FieldAbstract;

/**
 * Class TipoRegistroAbstract
 * @author yourname
 */
abstract class TipoRegistroAbstract implements JsonSerializable, DOI6Serializable
{
    protected $checksum;
    protected $fields = [];
    protected $codes = [];
    protected $misc = [];

    public function getChecksum()
    {
        return $this->checksum;
    }

    public function setChecksum($checksum)
    {
        $this->checksum = $checksum;

        return $this;
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function pushField(FieldAbstract $field)
    {
        $this->fields[$field->getStartPosition()] = $field;

        return $this;
    }

    public function getCodes()
    {
        return $this->codes;
    }

    public function pushCode($codeModel)
    {
        $this->pushField($codeModel->field);

        if (!isset($this->codes[$codeModel->field->getKey()])) {
            $this->codes[$codeModel->field->getKey()] = [];
        }

        $this->codes[$codeModel->field->getKey()][] = $codeModel;

        return $this;
    }

    public function getMisc()
    {
        return $this->misc;
    }

    public function pushMisc($key, array $data)
    {
        $this->misc[$key] = $data;

        return $this;
    }

    public function jsonSerialize()
    {
        return array_merge(
            [
                'codes' => $this->getCodes(),
                'misc' => $this->getMisc(),
            ],
            $this->getFields()
        );
    }

    public function serializeDOI6()
    {
        $line = "";

        foreach ($this->getFields() as $field) {
            $line .= $field->getPadValue();
        }

        return $line;
    }
}
