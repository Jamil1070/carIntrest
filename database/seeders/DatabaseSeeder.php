<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Andere seeders kun je hier ook aanroepen
        $this->call([
            AdminUserSeeder::class,
            CarSeeder::class,
            CommentSeeder::class,
            FaqSeeder::class,
            NewsSeeder::class,
        ]);
    }
}
