<?php

namespace App\Modules\Pub\Methods\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    use HasFactory;

    protected $fillable = [
        'alias',
        'title',
        'type',
        'description',

    ];
}
