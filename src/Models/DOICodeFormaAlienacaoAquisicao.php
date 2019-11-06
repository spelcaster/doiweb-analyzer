<?php

namespace DOIWeb\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use DOIWeb\Fields\FormaAlienacaoAquisicao;

class DOICodeFormaAlienacaoAquisicao extends UuidModelAbstract implements HasFieldInterface
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'doiweb_code_forma_alienacao_aquisicao';

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

        $obj = new FormaAlienacaoAquisicao();
        $obj->setValue($this->code);
        return $obj;
    }
}
