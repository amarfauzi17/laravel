<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
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
    			'name' 		=> 'jeri',
    			'email'		=>	'jeri@mail.com',
    			'post_id'	=> 2,
    			'comment'		=> 'artikel nice inpo gan',
                'created_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			'name' 		=> 'ical',
    			'email'		=>	'ical@mail.com',
    			'post_id'	=> 2,
    			'comment'		=> 'artikel nice inpo gan',
                'created_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			'name' 		 => 'rendi',
    			'email'		 =>	'rendi@mail.com',
    			'post_id'	 => 2,
    			'comment'	 => 'nice artikel sport',
                'created_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s')
    		]
    	];

    	Comment::insert($data);
    }
}
