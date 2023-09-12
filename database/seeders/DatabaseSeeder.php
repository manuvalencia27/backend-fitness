<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\Tag::factory()->create([
            'name' => 'Destacado'
        ]);

        \App\Models\Tag::factory()->create([
            'name' => 'Popular'
        ]);

        \App\Models\Tag::factory()->create([
            'name' => 'Nuevo'
        ]);

        \App\Models\Tag::factory(12)->create();
        \App\Models\Category::factory(30)->create();
        \App\Models\Product::factory(30)->create();
        \App\Models\User::factory()->create([
            'name' => 'Mvalencia',
            'email' => 'mvalencia@gmail.com',
            'role' => 1,
            'password' => Hash::make('123456'),
        ]);
        
        \App\Models\User::factory(4)->administrator()->create();
        
        \App\Models\User::factory(25)->customer()->create();

    }
}
