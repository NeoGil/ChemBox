<?php

namespace App\Modules\Pub\Course\Controllers\Api;

use App\Modules\Pub\Course\Requests\CourseRequest;
use App\Modules\Pub\Course\Services\CourseService;
use App\Modules\Pub\Course\Models\Course;
use App\Services\Response\ResponseServise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    private $service;

    /**
     * Display a listing of the resource.
     *
     * @param CourseService $courseService
     */

    public function __construct(CourseService $courseService)
    {
        $this->service = $courseService;
    }

    public function index()
    {
        return ResponseServise::sendJsonResponse(true, 200,[],[
            'items' =>  $this->service->getSources()
        ]);
    }

    /**
     * Create of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param CourseRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($alias)
    {
        //$course =  DB::table('courses')->where('alias', $alias)->get();
        $course = Course::where('alias', $alias)->first();
        return ResponseServise::sendJsonResponse(true, 200, [],[
            'item' => $course
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Pub\Course\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Pub\Course\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modules\Pub\Course\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
