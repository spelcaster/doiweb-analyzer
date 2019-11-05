<?php

namespace DOIWeb\Fields;

/**
 * Class TipoImovel
 * @author yourname
 */
class TipoImovel extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 141;
    protected $length = 2;
    protected $key = 'tipo_imovel';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
