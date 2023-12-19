<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model {
    use HasFactory;

    protected $fillable = [
        'number',
        'title',
        'chapter_id',
    ];

    public function chapter(): BelongsTo {
        return $this->belongsTo(Chapter::class);
    }

    public function words(): HasMany {
        return $this->hasMany(Word::class, 'unit_id');
    }
}
