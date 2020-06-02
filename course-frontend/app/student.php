<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $table = 'student';
    protected $primarykey = 'id';
    protected $fillable = ['name','email','subject_course','address','phone_number'];
}
