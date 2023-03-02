<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Locatie;
use App\Models\Machine;
use App\Models\Medewerker;
use App\Models\Statusniveau;
use App\Models\Statusupdate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      

        // \App\Models\User::factory(10)->create();
        // \App\Models\Machine::factory(6)->create();

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
            'locatie_id' => '1'
        ]);
        Medewerker::create([
            'naam' => 'Mike',
            'locatie_id' => '3'
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
