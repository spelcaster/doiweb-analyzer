<?php

namespace DOIWeb\Fields;

/**
 * Class DescricaoTipoImovel
 * @author yourname
 */
class DescricaoTipoImovel extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 143;
    protected $length = 30;
    protected $key = 'descricao_tipo_imovel';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
