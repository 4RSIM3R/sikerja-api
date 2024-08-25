<?php

namespace Database\Seeders;

use App\Models\Annoucement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnoucementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $announcements = [
            [
                'title' => 'First Annoucement',
                'content' => 'There will be a scheduled maintenance this Friday at 9 PM.',
                'media' => 'https://sisemar.sumedangkab.go.id/assets/upload/034f45f91503754d82bc21d83d3c4c1f.jpg',
            ],
            [
                'title' => 'Second Annoucement',
                'content' => 'There will be a scheduled maintenance this Friday at 9 PM.',
                'media' => 'https://sisemar.sumedangkab.go.id/assets/upload/034f45f91503754d82bc21d83d3c4c1f.jpg',
            ],
            [
                'title' => 'Third Annoucement',
                'content' => 'There will be a scheduled maintenance this Friday at 9 PM.',
                'media' => 'https://sisemar.sumedangkab.go.id/assets/upload/034f45f91503754d82bc21d83d3c4c1f.jpg',
            ],
            [
                'title' => 'Fourth Annoucement',
                'content' => 'There will be a scheduled maintenance this Friday at 9 PM.',
                'media' => 'https://sisemar.sumedangkab.go.id/assets/upload/034f45f91503754d82bc21d83d3c4c1f.jpg',
            ]
        ];

        foreach ($announcements as $announcement) {
            $media = $announcement['media'] ?? '';
            unset($announcement['media']);
            $item = Annoucement::create($announcement);
            $item->addMediaFromUrl($media)->toMediaCollection('thumbnails');
        }
    }
}
