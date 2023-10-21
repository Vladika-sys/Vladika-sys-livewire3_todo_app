<?php

namespace App\Livewire;

use App\Services\TodoService;
use Illuminate\Support\Facades\Crypt;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Component;
use App\Models\Task;
use Livewire\WithPagination;

class ToDo extends Component
{
    use WithPagination;

    public $title, $description, $dueDate, $category_id, $searchInput,$selectedTaskId, $editedTaskName, $editedTaskDescription, $editedTaskDueDate, $editedTaskCategory;

    protected $rules = [
        'title' => 'required|unique:tasks|min:6|max:255',
        'description' => 'required|min:6|max:500',
        'dueDate' => 'required|after_or_equal:today',


    ];
    protected $messages = [
        'title.required' => 'The task name is required',
        'title.min' => 'The task name must be at least 6 characters',
        'title.max' => 'The task name must be less than 255 characters',
        'title.unique' => 'The task name must be unique',
        'description.required' => 'The task description is required',
        'description.min' => 'The task description must be at least 6 characters',
        'description.max' => 'The task description must be less than 500 characters',
        'dueDate.required' => 'The task due date is required',
        'dueDate.after_or_equal' => 'The task due date must be in the future',


    ];
    public function createToDo(){
        $this->validate();
        (new TodoService)->addNewTask($this->title, $this->description, $this->category_id, $this->dueDate);
        session()->flash('success', 'Task created successfully');
        $this->reset();
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.to-do',[
            'tasks' => (new \App\Services\TodoService)->searchAndDisplayTask($this->searchInput),
        ]);
    }

    public function deleteTask($id){
        (new TodoService)->deleteTask($id);
        $this->resetPage();
    }

    public function completeTask($task){
        (new TodoService)->completeTask($task);
        $this->resetPage();
    }
    #[On('showTaskEditModal')]
    public function editTask($task){
        $this->selectedTaskId = Crypt::encryptString($task['id']);
        $this->title = $task['title'];
        $this->description = $task['description'];
        $this->category_id = $task['category_id'];
        $this->dueDate = $task['dueDate'];
        $this->dispatch('showTaskEditModal');

    }
    #[On('hideTaskEditModal')]
    public function updateTask(){
        $this->validate();
        (new TodoService)->updateTask(Crypt::decryptString($this->selectedTaskId), $this->title, $this->description, $this->category_id, $this->dueDate);
        $this->reset();
        $this->dispatch("hideTaskEditModal");
        session()->flash('updated', 'Task updated successfully');
    }
}
