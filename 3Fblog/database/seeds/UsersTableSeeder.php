<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	['name' => 'dangvando', 'email' => 'dangvando@gmail.com', 'password' => Hash::make('123456')],
        	['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => Hash::make('123456')],
        	['name' => 'thanh', 'email' => 'nguyentuanthanh@gmail.com', 'password' => Hash::make('123456')],
        	['name' => 'huynh', 'email' => 'NguyenBaHuynh@gmail.com', 'password' => Hash::make('123456')],
        ];
        foreach ($users as $value) {
        	DB::table('users')->insert($value);
        }
    }
}
