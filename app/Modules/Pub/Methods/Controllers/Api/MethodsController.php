<?php

namespace App\Modules\Pub\Methods\Controllers\Api;

use App\Modules\Pub\Methods\Models\Method;
use App\Modules\Pub\Methods\Services\MethodService;
use App\Services\Response\ResponseServise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MethodsController extends Controller
{
    /**
     * @var MethodService
     */
    private $service;

    /**
     * Display a listing of the resource.
     *
     * @param MethodService $methodService
     */

    public function __construct(MethodService $methodService)
    {
        $this->service = $methodService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
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
     * @param  \App\Modules\Pub\Methods\Models\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function show(Method $method)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Pub\Methods\Models\Method  $method
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
     * @param  \App\Modules\Pub\Methods\Models\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Method $method)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modules\Pub\Methods\Models\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function destroy(Method $method)
    {
        //
    }
}
