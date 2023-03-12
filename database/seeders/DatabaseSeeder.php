<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Listing;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //create multiple users and listings
        //\App\Models\User::factory(5)->create();
        //\App\Models\Listing::factory(7)->create();
//create single user with many listings to test relationship
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Listing::factory(10)->create([
            'user_id' => $user->id,
        ]);
    }
}
