<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
    		[
    			'name' => 'Health',
                'slug' => str_slug('Health'),
                'created_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			'name' => 'Sport',
                'slug' => str_slug('Sport'),
                'created_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			'name' => 'Entertainment',
                'slug' => str_slug('Entertainment'),
                'created_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			'name' => 'Food & Drink',
                'slug' => str_slug('Food & Drink'),
                'created_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			'name' => 'Holiday',
                'slug' => str_slug('Holiday'),
                'created_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s')
    		]
    	];

    	Category::insert($data);
    }
}
