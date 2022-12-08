<?php

namespace Skcin7\LaravelLinktree\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'linktree_groups';

    /**
     * The model's default values for attributes.
     * @var array
     */
    protected $attributes = [
        'name' => "",
        'description' => "",
        'priority' => 0,
        'is_hidden' => false,
    ];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'name' => "string",
        'description' => "string",
        'priority' => "integer",
        'is_hidden' => "boolean",
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

    /**
     * Get the group that the link belongs to.
     * @return HasMany
     */
    public function links(): HasMany
    {
        return $this->hasMany('Skcin7\LaravelLinktree\Models\Link');
    }
}