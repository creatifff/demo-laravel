<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Collection;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        User::query()->create([
//            'name' => 'admin',
//            'surname' => 'adminov',
//            'midname' => 'adminich',
//            'login' => 'admin',
//            'email' => 'admin@mail.ru',
//            'password' => Hash::make('admin11'),
//            'role' => 'admin',
//        ]);

        Collection::factory(20)->create();
        Product::factory(666)->create();
    }


}
