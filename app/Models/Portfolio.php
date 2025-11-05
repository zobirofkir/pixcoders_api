<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        "user_id",
        "title",
        "category", 
        "description",
        "image",
        "technologies",
        "link",
        "featured",
        "slug"
    ] ;

    protected $casts = [
        "technologies" => "array",
        "featured" => "boolean",
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
     * Relation Sheep With User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
