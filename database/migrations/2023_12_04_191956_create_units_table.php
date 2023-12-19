<?php

use App\Models\Chapter;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('title');
            $table->foreignIdFor(Chapter::class);
            $table->timestamps();

            $table->foreign('chapter_id')->on('chapters')->references('id');

            $table->unique(['chapter_id', 'number']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('units');
    }
};
