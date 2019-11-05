<?php

namespace DOIWeb\Fields;

/**
 * Class EnderecoImovel
 * @author yourname
 */
class EnderecoImovel extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 193;
    protected $length = 40;
    protected $key = 'endereco_imovel';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
