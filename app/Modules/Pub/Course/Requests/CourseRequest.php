<?php

namespace App\Modules\Pub\Course\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'alias' => 'required',
        ];
    }
}
