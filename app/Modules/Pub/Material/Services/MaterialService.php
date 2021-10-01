<?php
namespace App\Modules\Pub\Material\Services;

use App\Modules\Pub\Material\Models\Material;
use Illuminate\Support\Facades\DB;

class MaterialService
{

    public function getSources($curse, $method)
    {
        $material = Material::all()->where('courses_id', $curse)->where('methods_id', $method);
        foreach ($material as $item) {
            $new_material[] = $item;
        }
        return $new_material;

    }
}
