<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model 
{
    use HasTranslations;

    protected $fillable = ['Name','Notes'];
    public $translatable = ['Name'];
    protected $table = 'Grades';
    public $timestamps = true;

}