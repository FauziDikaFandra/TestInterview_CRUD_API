<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the applications database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('s_user_table')->insert([
            'status' => 'Active',
            'position' => 'IT',
        ]);
        $usertable = DB::table('s_user_table')->orderBy('user_id', 'desc')->get();
        DB::table('s_user')->insert(
            [
                'user_id' => $usertable[0]->user_id, 'username' => $usertable[0]->user_id, 'password' => $usertable[0]->user_id
            ]
        );
    }
}
