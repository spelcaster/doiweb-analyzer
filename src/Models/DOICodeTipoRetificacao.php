<?php

namespace DOIWeb\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use DOIWeb\Fields\RetificacaoAto;

class DOICodeTipoRetificacao extends UuidModelAbstract implements HasFieldInterface
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'doiweb_code_tipo_retificacao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'value'
    ];

    public $visible = ['value'];

    public function getFieldAttribute()
    {
        if (!$this->id) {
            return;
        }

        $obj = new RetificacaoAto();
        $obj->setValue($this->code);
        return $obj;
    }
}
