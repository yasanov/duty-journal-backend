<?php

namespace App\Models;

use Database\Factories\StaffFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Staff extends Model
{
    /** @use HasFactory<StaffFactory> */
    use HasFactory;

    protected $table = 'staff';

    protected $fillable = [
        'name',
        'initials',
        'position',
        'department',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function journalEntries(): HasMany
    {
        return $this->hasMany(JournalEntry::class);
    }

    public function vacations(): HasMany
    {
        return $this->hasMany(Vacation::class);
    }

    public function birthday(): HasOne
    {
        return $this->hasOne(Birthday::class);
    }

    public function outgoingShiftEntries(): HasMany
    {
        return $this->hasMany(JournalEntry::class, 'shift_from_staff_id');
    }

    public function incomingShiftEntries(): HasMany
    {
        return $this->hasMany(JournalEntry::class, 'shift_to_staff_id');
    }
}
