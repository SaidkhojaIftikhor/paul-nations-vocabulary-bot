<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Unit */
class UnitResource extends JsonResource {
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'title' => $this->title,
            'chapter_id' => $this->chapter_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
