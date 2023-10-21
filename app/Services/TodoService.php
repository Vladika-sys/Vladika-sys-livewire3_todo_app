<?php
namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;


class TodoService{

    public function searchAndDisplayTask($searchInput){
        return Task::latest()->where('title','like',"%{$searchInput}%")->paginate(5);
    }

    public function addNewTask($title, $description, $category_id, $due_date): void
    {
        $task = new Task();
        $task->title = $title;
        $task->description = $description;
        $task->category_id = $category_id;
        $task->dueDate = $due_date;
        $task->save();
    }

    public function updateTask($id, $title, $description, $category_id, $due_date): void
    {
        $task = Task::find($id);
        $task->title = $title;
        $task->description = $description;
        $task->category_id = $category_id;
        $task->dueDate = $due_date;
        $task->save();
    }

    public function deleteTask($id): void
    {
        try{
            $task = Task::findOrFail($id);
            $task->delete();
            session()->flash('deleted', 'Task deleted successfully');
        }catch(\Exception $e){
            session()->flash('deleteError', 'Task not found');
        }
    }
    public function completeTask($task){
        $task = Task::find($task);
        $task->completed = !$task->completed;
        $task->save();
        session()->flash('completed', 'Task completed successfully');
    }


}
