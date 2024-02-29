<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $departments = [
            [
                'id' => 1,
                'branch_id' => 1,
                'code' => "1010-CSE",
                'name' => "Computer Science Engineering",
                'description' => "",
                'status' => "active"
            ],
            [
                'id' => 2,
                'branch_id' => 1,
                'code' => "1010-EEE",
                'name' => "Electrical and Electronic Engineering",
                'description' => "",
                'status' => "active"
            ],
            [
                'id' => 3,
                'branch_id' => 1,
                'code' => "1010-EC",
                'name' => "Economics",
                'description' => "",
                'status' => "active"
            ],
            [
                'id' => 4,
                'branch_id' => 1,
                'code' => "1010-BBA",
                'name' => "Business Administration",
                'description' => "",
                'status' => "active"
            ],
            [
                'id' => 5,
                'branch_id' => 1,
                'code' => "1010-PS",
                'name' => "Political Science",
                'description' => "",
                'status' => "active"
            ],
        ];

        foreach($departments as $department) {
            Department::create($department);
        }
    }
}
