<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Section extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['name','status','grade_id','class_id'];
    public $translatable = ['name'];
    protected $table = 'sections';
    public $timestamps = true;

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class,'class_id');
    }

}
