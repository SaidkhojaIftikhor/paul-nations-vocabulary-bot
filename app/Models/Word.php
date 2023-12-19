<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Word extends Model {
    use HasFactory;

    protected $fillable = [
        'value',
        'unit_id',
        'options',
    ];

    protected $casts = [
        'options' => 'array',
    ];

    public function unit(): BelongsTo {
        return $this->belongsTo(Unit::class);
    }
}
