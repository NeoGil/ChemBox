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
                'expandable' => true,
                'level' => 0,
                'route' => "courses/$course->alias",
            ];
            array_push($tree_data, $data);
            foreach ($methods as $method) {
                $data = [
                    'name' => "$method->title",
                    'expandable' => false,
                    'level' => 1,
                    'route' => "courses/$course->alias/$method->alias",
                ];
                array_push($tree_data, $data);
            }
        }


//        $data = [
//            'name' => $course[0],
//            'expandable' => $method[0],
//            'level' => $method[0],
//            'route' => $method[0],
//        ];
//
//        array_push($tree_data, $data);
//
//        $data = [
//            'course' => $course[1],
//            'method' => $method[2]
//        ];
//
//        array_push($tree_data, $data);

        return $tree_data;
    }


}
