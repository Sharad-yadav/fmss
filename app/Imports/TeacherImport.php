<?php

namespace App\Imports;

use App\Constants\RoleConstant;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class TeacherImport implements ToCollection, WithHeadingRow, WithValidation
{
    public function collection(Collection $rows)
    {
        DB::beginTransaction();
        foreach ($rows as $row)
        {
            $userData = [
                'name'          => $row['name'],
                'email'         => $row['email'],
                'number'        => $row['number'],
                'role_id'       => RoleConstant::TEACHER_ID,
                'password'      => bcrypt('password')
            ];
            $teacherData = [
                'faculty_id'       => $row['faculty'],
                'salary'        => $row['salary'],
                'is_hod'        => $row['is_hod'],
                'is_lab'        => $row['is_lab']
            ];
            $user = User::create($userData);
            $user->teacher()->create($teacherData);
        }
        DB::commit();
    }

    public function rules(): array
    {
        return [
            'name'      => 'required|string|max:25',
            'email'     => 'required|email|unique:users,email,',
            'number'    => 'required|min:10',
            'salary'    => 'required',
            'faculty'=> 'required'
        ];
    }
}
