<?php

namespace App\Modules\Pub\Material\Controllers\Api;

use App\Modules\Pub\Course\Models\Course;
use App\Modules\Pub\Material\Models\Material;
use App\Modules\Pub\Material\Services\MaterialService;
use App\Modules\Pub\Methods\Models\Method;
use App\Services\Response\ResponseServise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialController extends Controller
{
    private $service;

    /**
     * Display a listing of the resource.
     *
     * @param MaterialService $materialService
     */
    public function __construct(MaterialService $materialService)
    {
        $this->service = $materialService;
    }

    public function index($curse, $method)
    {
        $curse = Course::where('alias', $curse)->select('id')->first();
        $method = Method::where('alias', $method)->select('id')->first();
        return ResponseServise::sendJsonResponse(true, 200,[],[
            'items' => $this->service->getSources($curse->id, $method->id)
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
     * @param  \App\Modules\Pub\Material\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Pub\Material\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Pub\Material\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modules\Pub\Material\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        //
    }
}
