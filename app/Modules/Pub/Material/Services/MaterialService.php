<?php
namespace App\Modules\Pub\Material\Services;

use App\Modules\Pub\Material\Models\Material;
use Illuminate\Support\Facades\DB;

class MaterialService
{

    public function getSources($curse, $method)
    {
        $material = DB::table('materials')->
        select('id', 'alias', 'title', 'courses_id', 'methods_id', 'description')->
        where('courses_id', $curse)->
        where('methods_id', $method)->
        get();

        return $material;
    }
}
