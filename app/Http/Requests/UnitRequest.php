<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest {
    public function rules(): array {
        return [
            'number' => ['required', 'integer'],
            'title' => ['required'],
            'chapter_id' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
