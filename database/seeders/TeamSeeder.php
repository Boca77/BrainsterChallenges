<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            '1980' => 'Arsenal',
            '1954' => 'Barcelona',
            '1985' => 'Real Madrid',
            '1989' => 'Liverpool',
            '1995' => 'Bayern Munich'
        ];

        foreach ($teams as $year => $team)
            Team::create([
                'name' => $team,
                'year_of_foundation' => $year
            ]);
    }
}
