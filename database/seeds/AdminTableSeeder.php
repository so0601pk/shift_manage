<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->insert([
            'name'              => '鈴木　聖一郎',
            'email'             => 'admin@example.com',
            'password'          => Hash::make('12345678'),
            'remember_token'    => Str::random(10),
            'admin_id'          => '12345678'
        ]);
    }
}
