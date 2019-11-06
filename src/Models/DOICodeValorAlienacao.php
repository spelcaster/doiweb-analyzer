<?php

namespace DOIWeb\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class DOICodeValorAlienacao extends UuidModelAbstract implements HasFieldInterface
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'doiweb_code_valor_alienacao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'value'
    ];
}
