<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Classe;
use App\Models\Etudiant;
use App\Models\Matiere;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Admin::create([
            'nom' => 'admin',
            'prenom' => 'admin',
            'email' => 'admin@example.com',
            'password' => '12345678'
        ]);
    }
}
