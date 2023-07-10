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
                'name' => 'ravi poudel',
                'user_id' => 1,
                'faculty_id' => 1,
                'batch_id' => 1,

            ],
            [
                'name' => 'Shambhu Bhagat',
                'user_id' => 1,
                'faculty_id' => 1,
                'batch_id' => 1,
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
