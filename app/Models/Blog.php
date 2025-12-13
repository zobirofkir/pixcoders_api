<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'title',
        'excerpt',
        'category',
        'author',
        'date',
        'readTime',
        'featured',
        'tags',
        'image',
        'slug',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'tags' => 'array',
        'featured' => 'boolean',
        'date' => 'date',
    ];

    /**
     * Get the route key for the model.
     * This allows us to use the 'slug' instead of 'id' in route model binding.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Relationship: Blog belongs to a User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
