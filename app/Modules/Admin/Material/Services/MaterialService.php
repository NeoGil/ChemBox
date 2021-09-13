<?php
namespace App\Modules\Admin\Material\Services;


use App\Modules\Admin\Material\Models\Material;
use App\Modules\Admin\Material\Requests\MaterialRequest;
use Illuminate\Database\Eloquent\Model;

class MaterialService
{
    public function save(MaterialRequest $request, Model $model) {

        $model->fill($request->only($model->getFillable()));
        $model->save();
        return true;
    }

    public function getSources()
    {
        return Material::all();
    }
}
