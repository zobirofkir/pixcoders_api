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
        "featured"
    ] ;

    protected $casts = [
        "technologies" => "array",
        "featured" => "boolean",
    ];

    /**
     * Relation Sheep With User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
