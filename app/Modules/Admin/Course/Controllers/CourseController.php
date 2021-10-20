<?php

namespace App\Modules\Admin\Course\Controllers;

use App\Modules\Admin\Course\Models\Course;
use App\Modules\Admin\Course\Requests\CourseRequest;
use App\Modules\Admin\Dashboard\Classes\Base;
use App\Modules\Admin\Course\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Base
{

    /**
     * RoleController constructor.
     * @param CourseService $courseService
     */
    public function __construct(CourseService $courseService)
    {
        parent::__construct();
        $this->service = $courseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', Course::class);


        $courses = Course::all();

        $this->title = "Title Course Index";

        $this->content = view('Admin::Course.index')->
        with([
            'courses' => $courses,
            'title' => $this->title,
        ])->
        render();

        return $this->renderOutput();
    }

    /**
     * Create of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $this->authorize('create', Course::class);


        $this->title = "Title Course create";

        $this->content = view('Admin::Course.create')->
        with([
            'title' => $this->title,
        ])->
        render();

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CourseRequest $request)
    {

        if($request->alias == null) {
            $new_alias = $this->service->translit_sef($request->title);
            $request['alias'] = $new_alias;
        }
        $this->service->save($request, new Course());
        return  \Redirect::route('courses.index')->with([
            'message' => __('Success')
        ]);
    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Admin\Course\Models\Course  $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $this->authorize('edit', Course::class);

        $this->title = "Title Course edit";

        $this->content = view('Admin::Course.edit')->
        with([
            'title' => $this->title,
            'item' => $course,
        ])->
        render();

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Admin\Course\Models\Course  $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CourseRequest $request, Course $course)
    {
        $this->service->save($request, $course);
        return  \Redirect::route('courses.index')->with([
            'message' => __('Success')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modules\Admin\Course\Models\Course  $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return  \Redirect::route('courses.index')->with([
            'message' => __('Success')
        ]);
    }
}
