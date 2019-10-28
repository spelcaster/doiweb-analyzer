<?php

namespace DOIWeb\Models;

use Illuminate\Database\Eloquent\Model;
use YourAppRocks\EloquentUuid\Traits\HasUuid;

/**
 * Class UuidModelAbstract
 * @package DOIWeb\Models
 */
abstract class UuidModelAbstract extends Model
{
    use HasUuid;

    /**
     * Avoid updating timestamps automatically
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $uuidColumnName = 'id';

    /**
     * Load the id value of the entity after created, needed because of uuid
     */
    public $incrementing = false;
}
