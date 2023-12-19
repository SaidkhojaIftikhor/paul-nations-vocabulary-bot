<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WordRequest extends FormRequest {
    public function rules(): array {
        return [
            'value' => ['required'],
            'unit_id' => ['required', 'integer'],
            'options' => ['required'],
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
