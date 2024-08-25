<?php

namespace Database\Seeders;

use App\Models\Assignment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $assignments = [
            [
                'title' => 'First Assignment',
                'number' => '1',
                'description' => 'This is the first assignment',
                'date' => '2024-08-17',
            ],
            [
                'title' => 'Second Assignment',
                'number' => '2',
                'description' => 'This is the second assignment',
                'date' => '2024-08-17',
            ],
            [
                'title' => 'Third Assignment',
                'number' => '3',
                'description' => 'This is the third assignment',
                'date' => '2024-08-17',
            ],
            [
                'title' => 'Fourth Assignment',
                'number' => '4',
                'description' => 'This is the fourth assignment',
                'date' => '2024-08-17',
            ]
        ];

        foreach ($assignments as $assignment) {
            $item = Assignment::create($assignment);
            $item->addMediaFromUrl('https://pdfobject.com/pdf/sample.pdf')->toMediaCollection('attachments');
        }
    }
}
