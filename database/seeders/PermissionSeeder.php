<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $permissions = [
            'dashboard_view',
            'student_view',
            'student_create',
            'student_edit',
            'student_delete',
            'recycle_bin_student_view',
            'recycle_bin_student_restore',
            'recycle_bin_student_permanent_delete',
            'recycle_bin_user_view',
            'recycle_bin_user_restore',
            'recycle_bin_user_permanent_delete',
            'user_view',
            'user_create',
            'user_edit',
            'user_delete',
            'role_view',
            'role_create',
            'role_edit',
            'role_delete',
            'application_configuration',
            'system_cache_clear',
            'profile_view',
            'profile_edit'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
