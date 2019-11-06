<?php

namespace DOIWeb\Fields;

/**
 * Class Filler
 * @author yourname
 */
class Filler extends FieldAbstract
{
    protected $startPosition;
    protected $length;
    protected $value;
    protected $key = 'filler';

    /**
     * @param $startPosition
     * @param $length
     */
    public function __construct($startPosition, $length)
    {
        $this->startPosition = $startPosition;
        $this->length = $length;
    }
}
