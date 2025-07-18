<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'the_agents';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ai_id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true; // we'd like to keep this true

    /**
     * The data type of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'input_tokens_per_unit_cost' => 1.0,
        'output_tokens_per_unit_cost' => 1.0,
    ];


    protected $fillable = [
        'name',
        'provider_name',
        'input_tokens_per_unit_cost',
        'output_tokens_per_unit_cost'
    ];
}
