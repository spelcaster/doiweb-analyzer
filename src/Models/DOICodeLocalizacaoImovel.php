<?php

namespace DOIWeb\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class DOICodeLocalizacaoImovel extends UuidModelAbstract
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'doiweb_code_localizacao_imovel';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'value'
    ];
}
