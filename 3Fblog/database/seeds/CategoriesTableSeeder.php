<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
    		['name' => 'Son'],
    		['name' => 'Sữa rửa mặt'],
    		['name' => 'Kem bôi da'],
    		['name' => 'Kem trị mụn'],
    		['name' => 'Kem tàng nhang'],
    	];
    	foreach ($categories as $value) 
    	{
    		DB::table('categories')->insert($value);
    	}
    	
    }
}
