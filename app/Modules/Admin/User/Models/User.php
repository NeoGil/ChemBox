<?php

namespace App\Modules\Admin\User\Models;

use App\Modules\Admin\Role\Models\Traits\UserRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthUser;
use Laravel\Passport\HasApiTokens;


class User extends AuthUser
{
    use HasFactory, HasApiTokens, UserRoles;

    protected $fillable = [
        'name',

    ];

    protected $hidden = [
        'password'
    ];


    public function getFullnameAttribute() {
        return $this->name;
    }




}

