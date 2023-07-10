<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers=[
            [
                'name'=>'prajwal poudel',
                'user_id'=>1,
                'faculty_id'=>1,
                'salary'=>50000
            ],
            [
                'name'=>'Chandan Bhagat',
                'user_id'=>1,
                'faculty_id'=>1,
                'salary'=>60000
            ],
        ];


        Schema::disableForeignKeyConstraints();
        Teacher::truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }
    }
}
