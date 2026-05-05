<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('journal_entries', function (Blueprint $table) {
            $table->id();
            $table->date('entry_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('event_type', 32)->index();
            $table->text('event_text');
            $table->foreignId('staff_id')->nullable()->constrained('staff')->nullOnDelete();
            $table->string('staff_name');
            $table->foreignId('shift_from_staff_id')->nullable()->constrained('staff')->nullOnDelete();
            $table->foreignId('shift_to_staff_id')->nullable()->constrained('staff')->nullOnDelete();
            $table->json('inspection_readings')->nullable();
            $table->timestamp('occurred_at')->nullable()->index();
            $table->timestamps();

            $table->index(['entry_date', 'start_time']);
            $table->index(['staff_id', 'entry_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journal_entries');
    }
};
