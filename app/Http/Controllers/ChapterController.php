<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapterRequest;
use App\Http\Resources\ChapterResource;
use App\Models\Chapter;

class ChapterController extends Controller {
    public function index() {
        return ChapterResource::collection(Chapter::all());
    }

    public function store(ChapterRequest $request) {
        return new ChapterResource(Chapter::create($request->validated()));
    }

    public function show(Chapter $chapter) {
        return new ChapterResource($chapter);
    }

    public function update(ChapterRequest $request, Chapter $chapter) {
        $chapter->update($request->validated());

        return new ChapterResource($chapter);
    }

    public function destroy(Chapter $chapter) {
        $chapter->delete();

        return response()->json();
    }
}
