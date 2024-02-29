<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Kursus;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        User::create([
            'name'=>'testing',
            'notelp' => '085293849384',
            'jeniskelamin' => 'pria',
            'email'=>'testing@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        User::create([
            'name'=>'admin',
            'notelp' => '085293849384',
            'jeniskelamin' => 'pria',
            'role'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin')
        ]);

        Category::create([
            'name'=>'Programing',
            'slug'=>'programing'
        ]);
        Category::create([
            'name'=>'Mobile App',
            'slug'=>'mobile-app'
        ]);
        Category::create([
            'name'=>'UI/UX ',
            'slug'=>'uiux-design'
        ]);

        Kursus::create([
            'judul'=>'Java prog',
            'description'=>'tutorial java for beginer',
            'category_id'=>1
        ]);
        Kursus::create([
            'judul'=>'Algoritma prog',
            'description'=>'How to understand algoritm',
            'category_id'=>1
        ]);
        Kursus::create([
            'judul'=>'Fluter ',
            'description'=>'tutorial flutter for beginer',
            'category_id'=>2
        ]);
        Kursus::create([
            'judul'=>'Figma ',
            'description'=>'tutorial Figma for beginer',
            'category_id'=>3
        ]);
    }
}
