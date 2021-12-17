<?php

namespace App\Commands;

use App\Games;

class AppCommand extends Command
{
    public function fresh()
    {
        $this->migrate();
        $this->seedRounds();
    }

    public function migrate()
    {
        $this->app->db()->createTable('rounds', [
            'player_nickname' => 'varchar(25)',
            'difficulty' => 'varchar(10)',
            'winner' => 'varchar(10)',
            'player_board' => 'varchar(5000)',
            'computer_board' => 'varchar(5000)',
            'started_on' => 'datetime',
            'ended_on' => 'datetime'
        ]);

        dump('Migration complete; check the database for your new tables.');
    }

    public function seedRounds()
    {
        $rounds = new Games($this->app->path('database/rounds.json'));

        foreach ($rounds->getAll() as $round) {

            # Don’t need ID - that will get automatically added
            unset($round['id']);

            // $round['player_board'] = $round['player_board'] ? 1 : 0;

            # Insert round
            $this->app->db()->insert('rounds', $round);
        }

        dump("rounds table has been seeded");
    }
}
