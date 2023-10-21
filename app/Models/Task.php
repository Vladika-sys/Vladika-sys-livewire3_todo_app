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
}
