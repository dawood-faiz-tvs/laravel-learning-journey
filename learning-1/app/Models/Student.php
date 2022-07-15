<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "students";
    protected $primaryKey = "id";

    // Mutator
    public function setNameAttribute($value){
        $this->attributes['name'] = ucwords($value);
    }

    // Accessor
    public function getStatusAttribute($value){
        if($value==1){
            return "Active";
        }
        if($value==0){
            return "Inactive";
        }
    }

    // public function setStudentNameAttribute($value){
    //     $this->attributes['student_name'] = ucwords($value);
    // }
}
