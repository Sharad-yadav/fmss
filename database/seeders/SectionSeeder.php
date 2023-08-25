<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            [
                'semester_id' => 1,
                'name' => 'A'
            ],
            [
                'semester_id' => 1,
                'name' => 'B'
            ],
            [
                'semester_id' => 2,
                'name' => 'A'
            ]
        ];

        Schema::disableForeignKeyConstraints();
        Section::truncate();
        Schema::enableForeignKeyConstraints();
        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
