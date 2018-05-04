<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Task::class, 10)->make()
            ->each(function($task) {

                $task->project()->associate(
                    \App\Models\Project::all()->random()
                );
                $task->save();
            });
    }
}
