<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Locatie;
use App\Models\Machine;
use App\Models\Medewerker;
use App\Models\Statusniveau;
use App\Models\Statusupdate;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      

        // \App\Models\User::factory(10)->create();
        // \App\Models\Machine::factory(6)->create();
        User::create([
            'id' => '1',
            'name' => 'Ilyas Mohamed',
            'email' => 'maxa_med_2@hotmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$afcdjqPGfsjQLzz2.sRpVOsCHMjN6ydvF1Q6ebaULj8XFofQT5W2q',
            'role' => 'admin',
            'remember_token' => Str::random(10)
        ]);
        User::create([
            'id' => '2',
            'name' => 'Elli student',
            'email' => 'd206947@edu.curio.nl',
            'email_verified_at' => now(),
            'password' => '$2y$10$afcdjqPGfsjQLzz2.sRpVOsCHMjN6ydvF1Q6ebaULj8XFofQT5W2q',
            'role' => 'standaard',
            'remember_token' => Str::random(10)
        ]);
        Locatie::create([
            'id' => '1',
            'naam' => 'werkruimte alpha',
        ]);Locatie::create([
            'id' => '2',
            'naam' => 'werkruimte bravo',
        ]);Locatie::create([
            'id' => '3',
            'naam' => 'lab',
        ]);

        Machine::create([
            'id' => '1',
            'naam' => 'Premix Preparator',
            'locatie_id' => '2'
        ]);
        Machine::create([
            'id' => '2',
            'naam' => 'Moulding Line',
            'locatie_id' => '2'
        ]);
        Machine::create([
            'id' => '3',
            'naam' => 'Premix Preparator',
            'locatie_id' => '2'
        ]);
        Machine::create([
            'id' => '4',
            'naam' => 'Extractor',
            'locatie_id' => '1'
        ]);
        Machine::create([
            'id' => '5',
            'naam' => 'Moisturizer',
            'locatie_id' => '3'
        ]);
        Machine::create([
            'id' => '6',
            'naam' => 'Packaging',
            'locatie_id' => '1'
        ]);
        Medewerker::create([
            'naam' => 'Ilyas',
            'locatie_id' => '1',
            'positie' => 'voorman'
        ]);
        Medewerker::create([
            'naam' => 'Mike',
            'locatie_id' => '3',
            'positie' => 'monteur'
        ]);
        Statusniveau::create([
            'niveaunaam' => 'Major',
        ]); Statusniveau::create([
            'niveaunaam' => 'Minor',
        ]); Statusniveau::create([
            'niveaunaam' => 'Critical',
        ]); Statusniveau::create([
            'niveaunaam' => 'Trivial',
        ]);
        Statusupdate::create([
            'updatenaam' => 'Open',
        ]); Statusupdate::create([
            'updatenaam' => 'In behandeling',
        ]); Statusupdate::create([
            'updatenaam' => 'Afgehandeld',
        ]);
       
    }
}
