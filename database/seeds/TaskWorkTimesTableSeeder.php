<?php

use Illuminate\Database\Seeder;

class TaskWorkTimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\TaskWorkTime::class, 10)->make()
            ->each(function($taskWorkTime) {

                $taskWorkTime->task()->associate(
                    \App\Models\Task::all()->random()
                );
                $taskWorkTime->save();
            });
    }
}
