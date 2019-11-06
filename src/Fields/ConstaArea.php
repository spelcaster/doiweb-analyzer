<?php

namespace DOIWeb\Fields;

use DOIWeb\Models\DOICodeAreaImovel;

/**
 * Class ConstaArea
 * @author yourname
 */
class ConstaArea
    extends FieldAbstract
    implements SettableValueInterface, HasCodeInterface
{
    protected $startPosition = 175;
    protected $length = 1;
    protected $key = 'consta_area';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getCode()
    {
        return DOICodeAreaImovel::where('code', $this->value)
            ->first();
    }
}
