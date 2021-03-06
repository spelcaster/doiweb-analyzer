<?php

namespace DOIWeb\Fields;

use JsonSerializable;

/**
 * Class FieldAbstract
 * @author yourname
 */
abstract class FieldAbstract implements JsonSerializable
{
    protected $startPosition;
    protected $length;
    protected $value;
    protected $key;
    protected $padType = STR_PAD_LEFT;

    public function getStartPosition()
    {
        return $this->startPosition;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function getValue()
    {
        return strval($this->value);
    }

    public function getPadValue()
    {
        $value = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $this->getValue());

        $lengthDiff = $this->length - (strlen($value) - 1); // without '\0'

        if ($lengthDiff <= 0) {
            return substr($value, -1 * $this->length);
        }

        return str_pad($value, $this->length, ' ', $this->padType);
    }

    public function getKey()
    {
        return $this->key;
    }

    public function jsonSerialize()
    {
        if ($this->getKey() == 'filler') {
            return [
                $this->getKey() => [
                    'start_position' => $this->getStartPosition(),
                    'length' => $this->getLength(),
                ]
            ];
        }

        return [
            $this->getKey() => $this->getValue(),
        ];
    }
}
