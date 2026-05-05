<?php

namespace App\Models;

use Database\Factories\BirthdayFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Birthday extends Model
{
    /** @use HasFactory<BirthdayFactory> */
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'name',
        'birth_date',
        'position',
        'department',
    ];

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
        ];
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}
