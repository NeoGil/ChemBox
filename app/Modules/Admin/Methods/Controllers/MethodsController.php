<?php

namespace App\Modules\Admin\Methods\Controllers;

use App\Modules\Admin\Dashboard\Classes\Base;
use App\Modules\Admin\Methods\Models\Method;
use App\Modules\Admin\Methods\Requests\MethodRequest;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Method::class);


        $this->title = "Title Method create";

        $this->content = view('Admin::Methods.create')->
        with([
            'title' => $this->title,
        ])->
        render();

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MethodRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MethodRequest $request)
    {
        if($request->alias == null) {
            $new_alias = $this->service->translit_sef($request->title);
            $request['alias'] = $new_alias;
        }
        $this->service->save($request, new Method());
        return  \Redirect::route('methods.index')->with([
            'message' => __('Success')
        ]);
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Method $method)
    {
        $this->authorize('edit', Method::class);

        $this->title = "Title Method edit";

        $this->content = view('Admin::Methods.edit')->
        with([
            'title' => $this->title,
            'item' => $method,
        ])->
        render();

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Admin\Methods\Models\Method  $method
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MethodRequest $request, Method $method)
    {
        if($request->alias == null) {
            $new_alias = $this->service->translit_sef($request->title);
            $request['alias'] = $new_alias;
        }
        $this->service->save($request, $method);
        return  \Redirect::route('methods.index')->with([
            'message' => __('Success')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modules\Admin\Methods\Models\Method  $method
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Method $method)
    {
        $method->delete();
        return  \Redirect::route('methods.index')->with([
            'message' => __('Success')
        ]);
    }
}
