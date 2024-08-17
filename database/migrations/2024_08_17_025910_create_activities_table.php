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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->date('report_period_start');
            $table->date('report_period_end');
            $table->text('execution_task')->comment('Pelaksana tugas');
            $table->text('result_plan')->comment('Rencana Hasil Kerja');
            $table->text('action_plan')->comment('Rencana Aksi');
            $table->text('output');
            $table->decimal('budget', 12, 2)->nullable();
            $table->text('budget_source')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
