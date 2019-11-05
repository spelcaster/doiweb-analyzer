<?php

namespace DOIWeb\Fields;

/**
 * Class Livro
 * @author yourname
 */
class Livro extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 22;
    protected $length = 7;
    protected $key = 'livro';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
