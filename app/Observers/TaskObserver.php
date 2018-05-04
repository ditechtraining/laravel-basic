<?php
/**
 * Created by PhpStorm.
 * User: ditech
 * Date: 04/05/18
 * Time: 10:02
 */

namespace App\Observers;


use App\Models\Task;

class TaskObserver
{
    private $dumped = false;
    
    public function retrivied(Task $task)
    {
        if ($this->dumped) dump(__METHOD__, Task::class);
    }

    public function creating(Task $task)
    {
        if ($this->dumped) dump(__METHOD__, Task::class);
    }

    public function created(Task $task)
    {
        if ($this->dumped) dump(__METHOD__, Task::class);
    }

    public function updating(Task $task)
    {
        if ($this->dumped) dump(__METHOD__, Task::class);
    }

    public function updated(Task $task)
    {
        if ($this->dumped) dump(__METHOD__, Task::class);
    }

    public function saving(Task $task)
    {
        if ($this->dumped) dump(__METHOD__, Task::class);
    }

    public function saved(Task $task)
    {
        if ($this->dumped) dump(__METHOD__, Task::class);
    }

    public function deleting(Task $task)
    {
        if ($this->dumped) dump(__METHOD__, Task::class);
    }

    public function deleted(Task $task)
    {
        if ($this->dumped) dump(__METHOD__, Task::class);
    }
}