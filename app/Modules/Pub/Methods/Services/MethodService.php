<?php
/**
 * Created by PhpStorm.
 * User: note
 * Date: 13.12.2020
 * Time: 14:21
 */

namespace App\Modules\Pub\Methods\Services;


use App\Modules\Pub\Course\Models\Course;
use App\Modules\Pub\Methods\Models\Method;
use PhpParser\Node\Expr\Cast\Object_;

class MethodService
{

    public function getSources()
    {
        return Method::all();
    }

    public function getCourses_Methods()
    {
        $tree_data = [];

        $courses = Course::all();
        $methods = Method::all();

        foreach ($courses as $course) {
            $data = [
                'name' => "$course->title",
                'route' => "courses/$course->alias",
                'children' => []
            ];
            foreach ($methods as $method) {
                $data_child = [
                    'name' => "$method->title",
                    'route' => "courses/$course->alias/$method->alias",
                ];
                array_push($data['children'], $data_child);
            }
            array_push($tree_data, $data);
        }

        return $tree_data;
    }


}
