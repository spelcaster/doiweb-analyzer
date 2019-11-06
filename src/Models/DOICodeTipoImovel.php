<?php

namespace DOIWeb\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use DOIWeb\Fields\TipoImovel;

class DOICodeTipoImovel extends UuidModelAbstract implements HasFieldInterface
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'doiweb_code_tipo_imovel';

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

        $obj = new TipoImovel();
        $obj->setValue($this->code);
        return $obj;
    }
}
