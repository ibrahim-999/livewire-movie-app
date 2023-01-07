<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $userRecords = [
            [
                'id' => 1,
                'name' => 'ibrahim',
                'email' => 'admin@storex.com',
                'password' => '$2y$10$HNvf9znawr//RbQyuYMnd.ZD0kXCcE5/O.KZp9n.gXtlp5fGifreO',
            ],
            [
                'id' => 2,
                'name' => 'ahmed',
                'email' => 'user@storex.com',
                'password' => '$2y$10$HNvf9znawr//RbQyuYMnd.ZD0kXCcE5/O.KZp9n.gXtlp5fGifreO',
            ],
        ];

        DB::table('users')->insert($userRecords);
    }
}
