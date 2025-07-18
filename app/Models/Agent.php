<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
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

    protected $fillable = ['name', 'provider_name'];
}
