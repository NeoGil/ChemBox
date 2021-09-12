<?php

namespace App\Modules\Admin\Material\Controllers;

use App\Modules\Admin\Material\Models\Material;
use App\Modules\Admin\Material\Requests\MaterialRequest;
use App\Modules\Admin\Material\Services\MaterialService;
use Illuminate\Http\Request;
use App\Modules\Admin\Dashboard\Classes\Base;

class MaterialController extends Base
{

    public function __construct(MaterialService $materialService)
    {
        parent::__construct();
        $this->service = $materialService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('view', Material::class);


        $materials = Material::all();

        $this->title = "Title Materials Index";

        $this->content = view('Admin::Material.index')->
        with([
            'materials' => $materials,
            'title' => $this->title,
        ])->
        render();

        return $this->renderOutput();
    }

    /**
     * Create of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Material::class);


        $this->title = "Title Material create";

        $this->content = view('Admin::Material.create')->
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
    public function store(MaterialRequest $request)
    {
        $this->service->save($request, new Material());
        return  \Redirect::route('materials.index')->with([
            'message' => __('Success')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Admin\Material\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Modules\Admin\Material\Models\Material $material
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Material $material)
    {
        $this->authorize('edit', Material::class);

        $this->title = "Title Course edit";

        $this->content = view('Admin::Material.edit')->
        with([
            'title' => $this->title,
            'item' => $material,
        ])->
        render();

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Admin\Material\Models\Material  $material
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(MaterialRequest $request, Material $material)
    {
        $this->service->save($request, $material);
        return  \Redirect::route('materials.index')->with([
            'message' => __('Success')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modules\Admin\Material\Models\Material  $material
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return  \Redirect::route('materials.index')->with([
            'message' => __('Success')
        ]);
    }

}