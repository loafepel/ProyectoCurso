<?php

namespace Database\Seeders;



use Carbon\Factory;
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
    
        \App\Models\User::create([
            'name'=>'Felipe Loeza',
            'email' => 'F@admin.com',
            'password' => bcrypt('123456')
        ]);

        \App\Models\Post::factory(24)->create();

    }
}
