<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Client;
use App\Models\Comment;
use App\Models\Detail;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $frontend=Category::factory()->create(['name' => 'frontend','slug'=>'frontendSlug']);
        // $backend =Category::factory()->create(['name' => 'backend', 'slug' =>'backendSlug']);

        $smartphone =Category::factory()->create(['name'=>'Smartphone','slug'=>'smartphoneSlug']);
        $laptop =Category::factory()->create(['name' => 'Laptop', 'slug' =>'laptopSlug']);

        $iphone =Brand::factory()->create(['name'=>'iphone','slug'=>'iphoneslug']);
        $lenovo =Brand::factory()->create(['name' => 'lenovo', 'slug' =>'levonoslug']);

        // $tablet =Category::factory()->create(['name' => 'Tablet', 'slug' =>'TabletSlug']);
        // $smartwatch =Category::factory()->create(['name' => 'Smartwatch', 'slug' =>'smartwatchSlug']);
        // $accessories =Category::factory()->create(['name' => 'Accessories', 'slug' =>'accessoreisSlug']);

        // Blog::factory(6)->create(['category_id'=> $smartphone->id]);
        // Blog::factory(6)->create(['category_id'=> $laptop->id]);
        // Blog::factory(6)->create(['category_id'=> $tablet->id]);
        // Blog::factory(6)->create(['category_id'=> $smartwatch->id]);
        // Blog::factory(6)->create(['category_id'=> $accessories->id]);

        // User::factory(5)
        // ->has(Profile::factory(1))
        // ->create();

        // Blog::factory(10)
        // ->has(Comment::factory(2))
        // ->create();

        // User::factory(1)
        //     ->has(Detail::factory(1))
        //     ->create();

    

        // User::factory(10)
        //     ->has(Detail::factory(1))
        // ->create();

        // Blog::factory(10)
        //     ->has(
        //     Comment::factory(2)
        // )
        // ->create(['category_id'=> $laptop->id] );


        // \App\Models\User::factory(10)->create();
        // foreach (range(0,9) as $i) {
        //     $blog = new Blog();
        //     $blog->title = 'title1';
        //     $blog->slug = 'slug 1';
        //     $blog->body = 'body 1';
        //     $blog->save();
        // }

        // foreach (range(0,9) as $u) {
        //     $user = new User();
        //     $user->name = 'Aung ThiHa Oo';
        //     $user->email = 'atho@gmail.com';
        //     $user->password = '12345';
        //     $user->save();
        // }
    
        // Blog::factory(15)->create(); //user (15) blog(15)
        // User::factory(20)
        //     ->has(Blog::factory(3))
        //     ->create();

        // foreach(range(1,5) as $i){
        //     $client = new Client();
        //     $client->name = 'Client'.$i;
        //     $client->save();
        // }
        

    }
}
