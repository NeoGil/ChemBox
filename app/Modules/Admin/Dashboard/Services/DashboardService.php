<?php
namespace App\Modules\Admin\Dashboard\Services;

use App\Modules\Pub\Material\Models\Material;
use Illuminate\Support\Facades\DB;

class DashboardService
{

    public function getMaterilals()
    {

        return [
            'all' => count(DB::table('materials')->get()),
            'Active' => count(DB::table('materials')->where('activity', true)->get()),
            'NonActive' => count(DB::table('materials')->where('activity', false)->get()),
        ];
    }

    public function getCourses()
    {
        return [
            'all' => count(DB::table('courses')->get()),
            'Active' => count(DB::table('courses')->where('activity', true)->get()),
            'NonActive' => count(DB::table('courses')->where('activity', false)->get()),
        ];
    }

    public function getMethods()
    {

        return [
            'all' => count(DB::table('methods')->get()),
            'Active' => count(DB::table('methods')->where('activity', true)->get()),
            'NonActive' => count(DB::table('methods')->where('activity', false)->get()),
        ];
    }
}
