<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['teacher_id','first_name', 'last_name','gender','joined_year'];

    public function classrooms()
    {
        return $this->belongsToMany(Classrooms::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
