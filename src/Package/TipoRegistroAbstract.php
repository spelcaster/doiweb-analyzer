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
    protected $status = true;
    protected $alerts = [];

    abstract public function getRequiredFields();

    public function getStatus()
    {
        return $this->status;
    }

    public function getAlerts()
    {
        return $this->alerts;
    }

    public function pushAlert($alert)
    {
        $this->status = false;
        $this->alerts[] = $alert;

        return $this;
    }

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
        if (!$this->isValid($field)) {
            $this->status = false;

            $this->alerts[] = <<<EOF
O valor '{$field->getValue()}' não é válido para '{$field->getKey()}'
EOF;
        }

        $this->fields[$field->getStartPosition()] = $field;

        if ($field instanceof \DOIWeb\Fields\HasCodeInterface) {
            $code = $field->getCode();

            if ($code) {
                $this->addCode($field, $code);
            }
        }

        ksort($this->fields);

        return $this;
    }

    public function isValid(FieldAbstract $field)
    {
        if (!in_array($field->getKey(), $this->getRequiredFields())) {
            return true;
        }

        $value = $field->getValue();

        if (is_numeric($value)) {
            return true;
        }

        $value = trim($value);

        return !empty($value) && !is_null($value);
    }

    public function getCodes()
    {
        return $this->codes;
    }

    public function pushCode($code)
    {
        $field = $code->field;

        $this->pushField($field);

        $this->addCode($field, $code);

        return $this;
    }

    protected function addCode(FieldAbstract $field, $code)
    {
        $this->codes[$field->getKey()] = $code;
    }

    public function getMisc()
    {
        return $this->misc;
    }

    public function pushMisc($key, $data)
    {
        $this->misc[$key] = $data;

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
