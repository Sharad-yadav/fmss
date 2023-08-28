<?php

namespace App\Imports;

use App\Constants\RoleConstant;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentImport implements ToCollection, WithHeadingRow , WithValidation
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
                'role_id'       => RoleConstant::STUDENT_ID,
                'password'      => bcrypt('password')
            ];
            $studentData = [
                'faculty_id'       => $row['faculty'],
                'batch_id'        => $row['batch_year'],
                'semester_id'        => $row['semester'],
                'section_id'        => $row['section']
            ];
            $user = User::create($userData);
            $user->student()->create($studentData);
        }
        DB::commit();
    }
    public function rules(): array
    {
        return [
            'name'      => 'required|string|max:25',
            'email'     => 'required|email|unique:users,email,',
            'number'    => 'required|min:10',
            'semester'    => 'required',
            'faculty'=> 'required',
            'section'=> 'required',
            'batch_year'=> 'required',
        ];
    }
}
