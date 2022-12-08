<?php

namespace Skcin7\LaravelLinktree\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
   use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'linktree_settings';

    /**
     * The model's default values for attributes.
     * @var array
     */
    protected $attributes = [
        'key' => "",
        'value' => "",
        'type' => "string",
    ];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'key' => 'string',
        'value' => 'string',
        'type' => 'string',
    ];

    /**
     * Disable Laravel's mass assignment protection
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes excluded from the model's JSON form.
     * @var array
     */
    protected $hidden = [
        //
    ];


}
