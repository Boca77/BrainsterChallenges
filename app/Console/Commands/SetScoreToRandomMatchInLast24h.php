<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Game;
use Illuminate\Console\Command;

class GetRandomMatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:set-score';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets score to a random match in the past 24h';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Sets a score to a random match played in the last 24h

        $game = Game::query()->with('home', 'away')
            ->whereBetween('played_at', [Carbon::now()->subHours(24), Carbon::now('CEST')])
            ->whereNull('score')
            ->inRandomOrder()
            ->first();

        if ($game) {

            $game->update(
                [
                    'score' => fake()->numberBetween(0, 9) . ' - ' . fake()->numberBetween(0, 9),
                ]
            );
        } else {
            $this->info('error');
        }
    }
}
