<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => \Illuminate\Support\Facades\Hash::make('Password!321'),
            'is_admin' => true,
        ]);

        $this->command->info('Admin gebruiker succesvol aangemaakt!');
        $this->command->info('Email: admin@ehb.be');
        $this->command->info('Password: Password!321');
    }
}
