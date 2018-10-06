<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
    		['name' => 'Son BCE Đỏ hồng', 'price' => 11000, 'quantity' => 10, 'category_id' => 1 ],
    		['name' => 'Son BCE Cam', 'price' => 14000, 'quantity' => 20, 'category_id' => 1 ],
    		['name' => 'Sữa rửa mặt XO', 'price' => 12000, 'quantity' => 10, 'category_id' => 2 ],
    		['name' => 'Kem Bôi Da Thành Nguyễn', 'price' => 15000, 'quantity' => 40, 'category_id' => 3 ],
    		['name' => 'Kem trị mụn LoanDaisy', 'price' => 16000, 'quantity' => 16, 'category_id' => 4 ]    	
    	];
    	foreach ($products as $value) 
    	{
    		DB::table('products')->insert($value);
    	}
    }
}
