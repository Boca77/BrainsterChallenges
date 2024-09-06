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
    protected $signature = 'app:get-random-match';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Gets a random match played in the last 24h

        $game = Game::query()->with('home', 'away')
            ->where('played_at', '>', Carbon::now()->subDay())
            ->where('played_at', '<', Carbon::now())
            ->inRandomOrder()
            ->first();

        if ($game) {

            $this->info("Home Team: " . $game->home->name . " - Away Team: " . $game->away->name . " Score: " . $game->score . "Played At: " . $game->played_at);
        } else {

            $this->info('no game played');
        }
    }
}
