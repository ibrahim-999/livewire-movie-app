<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        $roleRecords = [
            [
                'id' => 1,
                'name' => 'admin',
                'guard_name' => 'web',
            ],
            [
                'id' => 2,
                'name' => 'user',
                'guard_name' => 'web',
            ],
        ];

        DB::table('roles')->insert($roleRecords);
    }
}
