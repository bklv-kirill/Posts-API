<?php

namespace App\Http\Requests\Comments;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "order_by" => ["nullable", "string", "in:id,date"],
            "content" => ["nullable", "string", "max:255"],
            "owner_id" => ["nullable", "string", "max:255"],
            "post_id" => ["nullable", "string", "max:255"],
        ];
    }
}
