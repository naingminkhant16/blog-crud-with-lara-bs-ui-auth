<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(BlogSeeder::class);

        User::factory()->create([
            'name' => "test",
            'email' => "test@gmail.com",
            "password" => password_hash('test1234', PASSWORD_DEFAULT)
        ]);

        User::factory()->create([
            'name' => "Mg Mg",
            'email' => "mgmg@gmail.com",
            "password" => password_hash('mgmg1234', PASSWORD_DEFAULT)
        ]);

        User::factory()->create([
            'name' => "Su Su",
            'email' => "susu@gmail.com",
            "password" => password_hash('susu1234', PASSWORD_DEFAULT)
        ]);
    }
}
