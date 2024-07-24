<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $isEdit =str_contains(request()->route()->uri(), 'update');
        // dd($isEdit);

        return [
            'title' => ['required'],
            'photo' => [!$isEdit ? 'required' : 'nullable' ,'image' ],
            'slug' => ['required'],
            'color' => ['required'],
            'price' => ['required'],
            'body' => ['required'],
            'category_id' => ['required'],
            'brand_id' => ['required'],
        ];
    }
}
