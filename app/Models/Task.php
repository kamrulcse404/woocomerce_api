<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [ 'client_id', 'project_id', 'task_title', 'task_description', 'tag_id', 'deadline' ];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function setDeadlineAttribute($value)
    {
        return $this->attributes['deadline'] = date('Y-m-d', strtotime($value));
    }
}
