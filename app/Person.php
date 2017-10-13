<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'surname',
    ];

    /**
     * @return HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    /**
     * @return HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
