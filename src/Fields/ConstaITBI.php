<?php

namespace DOIWeb\Fields;

use DOIWeb\Models\DOICodeValorItbiItcd;

/**
 * Class ConstaITBI
 * @author yourname
 */
class ConstaITBI
    extends FieldAbstract
    implements SettableValueInterface, HasCodeInterface
{
    protected $startPosition = 335;
    protected $length = 1;
    protected $key = 'consta_itbi';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getCode()
    {
        return DOICodeValorItbiItcd::where('code', $this->value)
            ->first();
    }
}
