<?php

namespace Database\Seeders;

use App\Constants\FacultyConstant;
use App\Models\Faculty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class FacultyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faculties = [
            [
                'name' => FacultyConstant::COMP,
                'years_to_graduate' => 4
            ],
            [
                'name' => FacultyConstant::CIVIL,
                'years_to_graduate' => 4
            ],

            [
                'name' => FacultyConstant::ARCH,
                'years_to_graduate' => 5
            ]
        ];

        Schema::disableForeignKeyConstraints();
        Faculty::truncate();
        Schema::enableForeignKeyConstraints();
        foreach ($faculties as $faculty) {
            Faculty::create($faculty);
        }
    }
}
