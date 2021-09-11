<?php
/**
 * Created by PhpStorm.
 * User: note
 * Date: 13.12.2020
 * Time: 14:21
 */

namespace App\Modules\Admin\Methods\Services;


use App\Modules\Admin\Methods\Models\Method;
use App\Modules\Admin\Methods\Requests\MethodRequest;
use Illuminate\Database\Eloquent\Model;

class MethodService
{
    public function save(MethodRequest $request, Model $model) {

        $model->fill($request->only($model->getFillable()));
        $model->save();

        return true;
    }

    public function getSources()
    {
        return Method::all();
    }
}
