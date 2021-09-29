<?php

namespace App\Modules\Pub\Material\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    use HasFactory;

    protected $fillable = [
        'alias',
        'title',
        'courses_id',
        'methods_id',
        'description',
    ];
}
