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
        	['name' => 'dangvando', 'email' => 'dangvando@gmail.com', 'password' => Hash::make('123456'),'image' => '1_amenu.jpg'],
        	['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => Hash::make('123456'),'image' => '10-1507693103760.png'],
        	['name' => 'thanh', 'email' => 'nguyentuanthanh@gmail.com', 'password' => Hash::make('123456'),'image' => '223238498189853349474221480315508o-1507458888625.jpg'],
        	['name' => 'huynh', 'email' => 'NguyenBaHuynh@gmail.com', 'password' => Hash::make('123456'),'image' => 'herra.jpg'],
        ];
        foreach ($users as $value) {
        	DB::table('users')->insert($value);
        }
    }
}
