<?php

namespace App\Modules\Admin\Material\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'alias',
        'title',
        'description',
        'content'
    ];
}
