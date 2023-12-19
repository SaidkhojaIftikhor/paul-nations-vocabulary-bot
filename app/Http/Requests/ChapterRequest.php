<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChapterRequest extends FormRequest {
    public function rules(): array {
        return [
            'number' => ['required', 'integer'],
            'title' => ['required'],
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
