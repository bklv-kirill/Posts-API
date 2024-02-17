<?php

namespace App\Http\Requests\Posts;

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
            "title" => ["nullable", "string", "max:255"],
            "content" => ["nullable", "string", "max:255"],
            "order_by" => ["nullable", "string", "max:255"],
            "owner_id" => ["nullable", "string", "max:255"],
            "category" => ["nullable", "string", "max:255"],
        ];
    }
}
