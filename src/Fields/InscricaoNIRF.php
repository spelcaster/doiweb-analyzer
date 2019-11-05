<?php

namespace DOIWeb\Fields;

/**
 * Class InscricaoNIRF
 * @author yourname
 */
class InscricaoNIRF extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 320;
    protected $length = 15;
    protected $key = 'inscricao_nirf';
    protected $padType = STR_PAD_RIGHT;

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
