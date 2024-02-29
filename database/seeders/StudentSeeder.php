<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Student::create([
            'registration_number' => "ST-10000001",
            'full_name' => "Anonymous Student",
            'mobile_number' => "017XXXXXXXX",
            'email' => "anonymous.student@gmail.com",
            'password' => bcrypt('123456'),
            'security' => "123456",
            'guardian_name' => "Anonymous Guardian",
            'guardian_mobile' => "017XXXXXXXX",
            'address' => "Dhaka, Bangladesh.",
            'status' => "active"
        ]);
    }
}
