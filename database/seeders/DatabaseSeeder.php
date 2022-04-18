<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();
        Post::factory(20)->create();

        DB::table('categories')->insert([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        DB::table('categories')->insert([
            'name' => 'Design',
            'slug' => 'design'
        ]);

        DB::table('categories')->insert([
            'name' => 'Gaming',
            'slug' => 'gaming'
        ]);
    }
}
