<?php

namespace DOIWeb\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class DOICodeValorItbiItcd extends UuidModelAbstract
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'doiweb_code_valor_itbi_itcd';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'value'
    ];
}
