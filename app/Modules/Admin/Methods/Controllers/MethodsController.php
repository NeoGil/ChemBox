<?php

namespace App\Modules\Admin\Methods\Controllers;

use App\Modules\Admin\Dashboard\Classes\Base;
use App\Modules\Admin\Methods\Models\Method;
use App\Modules\Admin\Methods\Services\MethodService;
use Illuminate\Http\Request;

class MethodsController extends Base
{
    public function __construct(MethodService $methodService)
    {
        parent::__construct();
        $this->service = $methodService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', Method::class);


        $methods = Method::all();

        $this->title = "Title Methods Index";

        $this->content = view('Admin::Methods.index')->
        with([
            'methods' => $methods,
            'title' => $this->title,
        ])->
        render();

        return $this->renderOutput();
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
     * @param  \App\Modules\Admin\Methods\Models\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function show(Method $method)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Admin\Methods\Models\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function edit(Method $method)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Admin\Methods\Models\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Method $method)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modules\Admin\Methods\Models\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function destroy(Method $method)
    {
        //
    }
}
