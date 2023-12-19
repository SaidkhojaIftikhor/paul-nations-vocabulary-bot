<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chapter extends Model {
    use HasFactory;

    protected $fillable = [
        'number',
        'title',
    ];

    public function units(): HasMany {
        return $this->hasMany(Unit::class, 'chapter_id');
    }
}
