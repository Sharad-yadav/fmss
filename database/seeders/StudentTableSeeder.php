<?php

namespace Database\Seeders;

use App\Models\student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class studentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [

                'user_id' => 2,
                'faculty_id' => 1,
                'batch_id' => 2075,
                'semester_id'=>'First',
                'section_id'=>'A',

            ],
            [

                'user_id' => 2,
                'faculty_id' => 1,
                'batch_id' => 1,
                'batch_id' => 2076,
                'semester_id'=>'First',
                'section_id'=>'A',
            ],
        ];


        Schema::disableForeignKeyConstraints();
        student::truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($students as $student) {
            student::create($student);
        }
    }
}
