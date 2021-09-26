<?php

namespace App\Modules\Pub\Menu\Models;

use App\Modules\Admin\Role\Models\Permissions;
use App\Modules\Admin\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    const MENU_TYPE_FRONT = 'front';
    const MENU_TYPE_ADMIN = 'admin';


    public function perms() {
        return $this->belongsToMany(Permissions::class, 'permission_menu');
    }


    public function scopeFrontMenu($query) {

        return $query->
        where('type', self::MENU_TYPE_FRONT);
    }

    public function scopeMenuByType($query, $type) {
        return $query->where('type', $type)->orderBy('parent')->orderBy('sort_order');
    }
}
