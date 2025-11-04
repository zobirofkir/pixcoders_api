<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Subscriber extends Model
{
    use HasRoles;
    protected $fillable = [
        "name",
        "phone",
        "opt_in"
    ];
}
