<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesTableSeeder extends Seeder
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
        		"title" => "Privacy Policy",
        		"slug"  => str_slug("Privacy Policy"),
        		"content" => "<p>The #1 Online Privacy Policy Generator! Here at Free Privacy Policy, we&#39;ve helped 815,960 website owners create easy-to-read, highly effective, custom privacy policies.</p> <p>Our intuitive, easy-to-use system allows you to create a custom privacy policy using our free website privacy policy generator.</p> <p>All you do is answer a few simple questions about your business and your website privacy policy is created and ready to add to your site. In fact, for most people it takes less than 15 minutes.</p> <p>Our Privacy Policy Creator includes several compliance verification tools to help you effectively protect your customers privacy, while limiting your liability, all while adhering to the most notable state and federal privacy laws and 3rd party initiatives, including:</p>",
        		'created_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s')
        	],
        	[
        		"title" => "Disclaimer",
        		"slug"  => str_slug("Disclaimer"),
        		"content" => "<p>lets you get started with a disclaimer. This template is free to download and use.</p> <p>You may want to&nbsp;<strong>include a disclaimer</strong>&nbsp;on your app or website as it is often the best way to address specific points of liability that could fall outside a Terms and Conditions or a Privacy Policy agreement.</p> <p>Here is an overview on disclaimers to help you determine if your website or app requires one.</p>",
        		 'created_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s')
        	]
        ];

        Page::insert($data);
    }
}
