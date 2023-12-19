<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Chapter */
class ChapterResource extends JsonResource {
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'title' => $this->title,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
