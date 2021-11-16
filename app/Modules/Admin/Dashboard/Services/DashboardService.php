<?php
namespace App\Modules\Admin\Dashboard\Services;

use App\Modules\Pub\Material\Models\Material;
use Illuminate\Support\Facades\DB;

class DashboardService
{

    public function getMaterilals($curse, $method)
    {
        $material = DB::table('materials')->
        select('id', 'alias', 'title', 'courses_id', 'methods_id', 'description')->
        where('courses_id', $curse)->
        where('methods_id', $method)->
        get();

        return $material;
    }

    public function getCourses()
    {
        $material = [
            'all' => count(DB::table('courses')->get()),
            'Active' => count(DB::table('courses')->where('activity', true)->get()),
            'NonActive' => count(DB::table('courses')->where('activity', false)->get()),
        ];

        return $material;
    }
}
