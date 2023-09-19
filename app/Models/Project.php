<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'client_id', 'tag_id', 'deadline'];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function setDeadlineAttribute($value)
    {
        $this->attributes['deadline'] = date('Y-m-d', strtotime($value));
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
