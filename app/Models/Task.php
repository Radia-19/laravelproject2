<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    public static function create(array $array)
    {
    }
     protected $fillable = ['name','details'];

    protected $table = 'tasks';

    //protected $guarded = [];
    public static function find($id)
    {

    }



}
