<?php

namespace App\Models;

use Database\Factories\VacationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vacation extends Model
{
    /** @use HasFactory<VacationFactory> */
    use HasFactory;

    public const TYPE_PLANNED = 'planned';

    public const TYPE_APPROVED = 'approved';

    public const TYPES = [
        self::TYPE_PLANNED,
        self::TYPE_APPROVED,
    ];

    protected $fillable = [
        'staff_id',
        'type',
        'start_date',
        'end_date',
        'comment',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}
