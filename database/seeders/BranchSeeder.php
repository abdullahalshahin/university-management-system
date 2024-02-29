<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Branch::create([
            'code' => "1010",
            'name' => "Mirpur (Central Branch)",
            'contact_number_1' => "017XXXXXXX1",
            'contact_number_2' => "017XXXXXXX2",
            'email' => "info@example.com",
            'domain' => "www.example.com",
            'address' => "Mirpur 10, Dhaka.",
            'is_central_branch' => "yes",
            'status' => "active"
        ]);
    }
}
