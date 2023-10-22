<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model{
    // Task -> table name = tasks
    // customed table name;
    // protected $table = 'tasks';
    protected $fillable = ['task_name','task_description','task_status','task_deadline','task_assigner','task_priority'];

    public $timestamps = true; //untuk melakukan update kolom created_at dan updated_at

}