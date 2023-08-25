<?php

namespace Database\Seeders;

use App\Constants\FacultyConstant;
use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semesters = [
            [
                'faculty_id' => FacultyConstant::COMP_ID,
                'name' => 'First'
            ],
            [
                'faculty_id' => FacultyConstant::COMP_ID,
                'name' => 'Second'
            ],
            [
                'faculty_id' => FacultyConstant::COMP_ID,
                'name' => 'Third'
            ]
        ];

        Schema::disableForeignKeyConstraints();
        Semester::truncate();
        Schema::enableForeignKeyConstraints();
        foreach ($semesters as $semester) {
            Semester::create($semester);
        }
    }
}
