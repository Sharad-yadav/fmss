<?php

namespace Database\Seeders;
use App\Constants\RoleConstant;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles=[
            [
                'name'=> RoleConstant::ADMIN
            ],
            [
                'name'=> RoleConstant::STUDENT
            ],
            [
                'name'=> RoleConstant::TEACHER
            ]
        ];
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();
        foreach($roles as $role){
            Role::create($role);
        }
    }
}
