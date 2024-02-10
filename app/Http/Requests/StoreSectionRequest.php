<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
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
            'name_ar' => ['required', 'max:255', 'string', new \App\Rules\UniqueFieldTranslation("sections", "name", 'ar')],
            'name_en' => ['required', 'max:255', 'string', new \App\Rules\UniqueFieldTranslation("sections", "name", 'en')],
            'media' => 'required|image|max:2048',
            "status" => "nullable|in:active,inactive",
            "section_id" => "nullable|exists:sections,id|not_in:." . $this->id,
        ];
    }

    public function messages()
    {
        return [
            "name_ar.required" => __('messages.filed required'),
            "name_en.max" => __("messages.filed must be less then 255 character"),
            "name_en.required" => __('messages.filed required'),
            "name_en.max" => __("messages.filed must be less then 255 character"),
            "media.required" => __('messages.filed required'),
            "media.image" => __('messages.filed must be image'),
            "media.max" => __('messages.filed must be less then 2MB'),
            "status.in" => __('messages.filed must be active or inactive'),
            "section_id.exists" => __('messages.filed must be exists'),
            "section_id.not_in" => __('messages.filed must be not in this section'),

        ];
    }
}
