<?php

namespace App\Commands;

use App\Games;

class AppCommand extends Command
{
    public function fresh()
    {
        // Create our table and insert initial data
        $this->migrate();
        $this->seedRounds();
    }

    public function migrate()
    {
        // Create our rounds table
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

            # Don’t need id
            unset($round['id']);

            # Insert round into the db > rounds table
            $this->app->db()->insert('rounds', $round);
        }

        dump("rounds table has been seeded");
    }
}
