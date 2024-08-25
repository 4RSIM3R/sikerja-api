<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{

    // $table->date('report_period_start');
    // $table->date('report_period_end');
    // $table->text('execution_task')->comment('Pelaksana tugas');
    // $table->text('result_plan')->comment('Rencana Hasil Kerja');
    // $table->text('action_plan')->comment('Rencana Aksi');
    // $table->text('output');
    // $table->decimal('budget', 12, 2)->nullable();
    // $table->text('budget_source')->nullable();

    public function run(): void
    {
        $activities = [
            [
                'report_perdiod_start' => '2023-01-01',
                'report_period_end' => '2023-01-31',
                'execution_task' => 'Pelaksana tugas',
                'result_plan' => 'Rencana Hasil Kerja',
                'action_plan' => 'Rencana Aksi',
                'output' => 'Output',
                'budget' => 100000,
                'budget_source' => 'Sumber Budget',
            ],
            [
                'report_perdiod_start' => '2023-02-01',
                'report_period_end' => '2023-02-28',
                'execution_task' => 'Pelaksana tugas',
                'result_plan' => 'Rencana Hasil Kerja',
                'action_plan' => 'Rencana Aksi',
                'output' => 'Output',
                'budget' => 100000,
                'budget_source' => 'Sumber Budget',
            ],
            [
                'report_perdiod_start' => '2023-03-01',
                'report_period_end' => '2023-03-31',
                'execution_task' => 'Pelaksana tugas',
                'result_plan' => 'Rencana Hasil Kerja',
                'action_plan' => 'Rencana Aksi',
                'output' => 'Output',
                'budget' => 100000,
                'budget_source' => 'Sumber Budget',
            ]
        ];

        foreach ($activities as $activity) {
            $item = Activity::create($activity);
        }

    }
}
