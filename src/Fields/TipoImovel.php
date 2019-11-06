<?php

namespace DOIWeb\Fields;

use DOIWeb\Models\DOICodeTipoImovel;

/**
 * Class TipoImovel
 * @author yourname
 */
class TipoImovel
    extends FieldAbstract
    implements SettableValueInterface, HasCodeInterface
{
    protected $startPosition = 141;
    protected $length = 2;
    protected $key = 'tipo_imovel';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getCode()
    {
        return DOICodeTipoImovel::where('code', $this->value)
            ->first();
    }
}
