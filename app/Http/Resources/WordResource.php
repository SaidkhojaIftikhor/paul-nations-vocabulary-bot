<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Word */
class WordResource extends JsonResource {
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'value' => $this->value,
            'unit_id' => $this->unit_id,
            'options' => $this->options,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
