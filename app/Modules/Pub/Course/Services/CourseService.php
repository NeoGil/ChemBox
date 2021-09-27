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
use Illuminate\Database\Eloquent\Model;

class CourseService
{

    public function getSources()
    {
        return Course::all();
    }
}
