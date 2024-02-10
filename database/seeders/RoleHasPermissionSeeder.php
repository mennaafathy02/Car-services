<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = Permission::all()->count();
        for ($i = 1; $i <= $count; $i++) {
            DB::table('role_has_permissions')->insert(
                [
                    'permission_id' => $i,
                    'role_id' => 1,

                ]
            );
        }
    }
}
