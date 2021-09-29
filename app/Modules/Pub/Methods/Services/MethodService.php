<?php
/**
 * Created by PhpStorm.
 * User: note
 * Date: 13.12.2020
 * Time: 14:21
 */

namespace App\Modules\Pub\Methods\Services;


use App\Modules\Pub\Methods\Models\Method;

class MethodService
{

    public function getSources()
    {
        return Method::all();
    }
}
