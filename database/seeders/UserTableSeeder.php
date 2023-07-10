<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Teacher;
use App\Constants\RoleConstant;
use Illuminate\Database\Seeder;
use App\Constants\FacultyConstant;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [
                'name' => 'Sharad Yadav',
                'email' => 'sharad08101@gmail.com',
                'password' => 'password',
                'number' => '9867157800',
                'role_id' => RoleConstant::ADMIN_ID
            ],
            [

                'name' => 'Ganesh Pant',
                'email' => 'ganesh3076@gmail.com',
                'password' => 'password',
                'number' => '986663076',
                'role_id' => RoleConstant::STUDENT_ID
            ],
            [

                'name' => 'sunil adhikari',
                'email' => 'sunil1@gmail.com',
                'password' => 'password',
                'number' => '986157800',
                'role_id' => RoleConstant::TEACHER_ID,
                'teacher' => [
                    'salary' => 2000,
                    'faculty_id' => FacultyConstant::COMP_ID
                ]
            ]
        ];

        Schema::disableForeignKeyConstraints();
        User::truncate();
        Teacher::truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($users as $user) {
            if (isset($user['teacher'])) {
                $teacherData = $user['teacher'];
                unset($user['teacher']);
            }

            $user = User::create($user);
            if (isset($teacherData)) {
                $user->teacher()->create($teacherData);
            }
        }
    }
}
