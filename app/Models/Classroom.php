<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Classroom extends Model 
{
    use HasTranslations;

    protected $fillable = ['Name','Grade_id'];
    public $translatable = ['Name'];
    protected $table = 'Classrooms';
    public $timestamps = true;

    public function Grades()
    {
        return $this->hasOne('Grade', 'Grade_id');
    }

}