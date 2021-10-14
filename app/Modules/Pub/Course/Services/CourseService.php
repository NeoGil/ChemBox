<?php
/**
 * Created by PhpStorm.
 * User: note
 * Date: 13.12.2020
 * Time: 14:21
 */

namespace App\Modules\Pub\Course\Services;


use App\Modules\Admin\Course\Models\Course;
use App\Modules\Admin\Course\Requests\CourseRequest;
use App\Modules\Admin\Methods\Models\Method;
use App\Modules\Pub\Material\Models\Material;
use Illuminate\Database\Eloquent\Model;
use function GuzzleHttp\Psr7\str;

class CourseService
{

    public function getSources()
    {
        return Course::all();
    }

    public function getNavLink($url_str)
    {
        $urls_ = [];
        $urls = explode('&8&', $url_str);
        array_shift($urls);

        if(isset($urls[1])){
            $course = Course::where('alias', $urls[1])->select('title')->first()->title;
        }
        if(isset($urls[2])){
            $method = Method::where('alias', $urls[2])->select('title')->first()->title;
        }
        if(isset($urls[3])){
            $courses_id = Course::where('alias', $urls[1])->select('id')->first()->id;
            $methods_id = Method::where('alias', $urls[2])->select('id')->first()->id;
            $material = Material::where('alias', $urls[3])->where('courses_id', $courses_id)->where('methods_id', $methods_id)->select('title')->first()->title;
        }


        for ($i=0; $i < count($urls); $i++) {
            $data = array();
            if(isset($urls[$i+1])) {
                $urls[$i+1] = "$urls[$i]/".$urls[$i+1];
            }
            if($i == 1) {
                $data = [
                    'title' => $course,
                    'route' => $urls[$i]
                ];
            }
            if($i == 2) {
                $data = [
                    'title' => $method,
                    'route' => $urls[$i]
                ];
            }
            if($i == 3) {
                $data = [
                    'title' => $material,
                    'route' => $urls[$i]
                ];
            }
            array_push($urls_, $data);
        }
        array_shift($urls_);
        return $urls_;
    }
}
