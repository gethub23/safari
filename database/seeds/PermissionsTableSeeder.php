<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           
        $permissions =
            [
                'dashboard',
                'permissions_list',
                'add_permission',
                'store_permission',
                'edit_permission',
                'update_permission',
                'delete_permission'
            ];

        foreach($permissions as $permission)
        {
            DB::table('permissions')->insert([
                'permissions'   => $permission,
                'role_id'       => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                ]);
        }


    }
}
