<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Project::class, 10)->make()
            ->each(function($project) {

                $project->company()->associate(
                    \App\Models\Company::all()->random()
                );
                $project->save();
            });
    }
}
