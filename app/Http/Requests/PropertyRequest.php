<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'previous_price' => 'nullable|numeric',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'sub_category_id' => 'nullable',
            'purpose' => 'required|string',
            'completion_status' => 'nullable|string',
            'address' => 'required|string',
            'area_id' => 'required',
            'sub_area_id' => 'nullable',
            'street' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:255',
            'bedroom' => 'nullable|numeric',
            'bathroom' => 'nullable|numeric',
            'garage' => 'nullable|numeric',
            'size' => 'required',
            'year_built' => 'nullable',
            'video_link' => 'nullable',
            'is_featured' => 'nullable',
            'consumer' => 'nullable',
            'status' => 'nullable',
            'photo' => 'nullable|mimes:jpeg,jpg,png'
        ];
    }
}
