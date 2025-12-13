<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GetStarted extends Model
{
    /**
     * Define Fillables
     */
    protected $fillable = [
        'name',
        'email',
        'company_name',
        'phone_number',
        'service',
        'project_type',
        'budget',
        'project_timeline',
        'project_description',
    ];
}
