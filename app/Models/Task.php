<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'created_at',
        'updated_at',
    ];

    public $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);

    }

    public static function addNewTask($title, $description, $category_id, $due_date){
        $task = new Task();
        $task->title = $title;
        $task->description = $description;
        $task->category_id = $category_id;
        $task->dueDate = $due_date;
        $task->save();
    }
}
