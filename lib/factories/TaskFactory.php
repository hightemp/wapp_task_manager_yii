<?php

namespace app\lib\factories;

use app\models\User;
use app\models\Task;

class TaskFactory
{
    public static function createTask($title, User $creator, $short_description, $description) {
        $task = new Task();
        $task->title = $title;
        $task->creator_id = $creator->id;
        $task->short_description = $short_description;
        $task->description = $description;

        return $task->save() ? $task : null;
    }
}