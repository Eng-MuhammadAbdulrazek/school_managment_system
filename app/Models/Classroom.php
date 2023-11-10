<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model 
{

    protected $table = 'Classrooms';
    public $timestamps = true;

    public function Grades()
    {
        return $this->hasOne('Grade', 'Grade_id');
    }

}