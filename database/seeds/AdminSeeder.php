<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
                'email' => 'admin@app.com',
                'password' => Hash::make(123456),
                'remember_token' => md5(uniqid('admin@app.com', true)),
                'name' => 'admin'
            ]);
    }
}
