<?php

namespace DOIWeb\Package;

use DOIWeb\Compatibility\DOI6Serializable;
use JsonSerializable;
use DOIWeb\Fields\FieldAbstract;
use RuntimeException;

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

    public function __get($key)
    {
        foreach ($this->getFields() as $field) {
            if ($field->getKey() == $key) {
                return $field->getValue();
            }
        }
    }

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

        if ($field instanceof \DOIWeb\Fields\HasCodeInterface) {
            $code = $field->getCode();

            if ($code) {
                $this->addCode($field, $code);
            }
        }

        return $this;
    }

    public function getCodes()
    {
        return $this->codes;
    }

    public function pushCode($code)
    {
        $field = $codeModel->field;

        $this->pushField($field);

        $this->addCode($field, $code);

        return $this;
    }

    protected function addCode(FieldAbstract $field, $code)
    {
        if (!isset($this->codes[$field->getKey()])) {
            $this->codes[$field->getKey()] = [];
        }

        $this->codes[$field->getKey()][] = $code;
    }

    public function getMisc()
    {
        return $this->misc;
    }

    public function pushMisc($key, $data)
    {
        if (!isset($this->misc[$key])) {
            $this->misc[$key] = [];
        }

        $this->misc[$key][] = $data;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'codes' => $this->getCodes(),
            'misc' => $this->getMisc(),
            'fields' => $this->getFields(),
        ];
    }

    public function serializeDOI6($validateChecksum)
    {
        $line = "";

        foreach ($this->getFields() as $field) {
            $line .= $field->getPadValue();
        }

        if ($validateChecksum && $this->getChecksum()) {
            $checksum = md5($line);

            if ($this->getChecksum() != $checksum) {
                $data = json_encode($this);

                throw new RuntimeException(
                    "Invalid checksum for '$data' expected '{$this->getChecksum()}' found '{$checksum}'"
                );
            }
        }

        return $line;
    }
}
