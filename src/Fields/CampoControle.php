<?php

namespace DOIWeb\Fields;

/**
 * Class CampoControle
 * @author yourname
 */
class CampoControle extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 18;
    protected $length = 6;
    protected $key = 'campo_controle';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
