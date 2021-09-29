<?php
namespace App\Modules\Pub\Material\Services;

use App\Modules\Pub\Material\Models\Material;

class MaterialService
{

    public function getSources($curse, $method)
    {
        return Material::all()->where('courses_id', $curse)->where('methods_id', $method);
    }
}
