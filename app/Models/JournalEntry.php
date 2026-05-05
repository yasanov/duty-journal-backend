<?php

namespace App\Models;

use Database\Factories\JournalEntryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JournalEntry extends Model
{
    /** @use HasFactory<JournalEntryFactory> */
    use HasFactory;

    public const TYPE_INSPECTION = 'inspection';

    public const TYPE_EMERGENCY = 'emergency';

    public const TYPE_OTHER = 'other';

    public const TYPE_SHIFT = 'shift';

    public const TYPES = [
        self::TYPE_INSPECTION,
        self::TYPE_EMERGENCY,
        self::TYPE_OTHER,
        self::TYPE_SHIFT,
    ];

    protected $fillable = [
        'entry_date',
        'start_time',
        'end_time',
        'event_type',
        'event_text',
        'staff_id',
        'staff_name',
        'shift_from_staff_id',
        'shift_to_staff_id',
        'inspection_readings',
        'occurred_at',
    ];

    protected function casts(): array
    {
        return [
            'entry_date' => 'date',
            'inspection_readings' => 'array',
            'occurred_at' => 'datetime',
        ];
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }

    public function shiftFromStaff(): BelongsTo
    {
        return $this->belongsTo(Staff::class, 'shift_from_staff_id');
    }

    public function shiftToStaff(): BelongsTo
    {
        return $this->belongsTo(Staff::class, 'shift_to_staff_id');
    }
}
