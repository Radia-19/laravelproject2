<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{

    use HasFactory;

    protected $fillable = ['name','details'];

    protected $table = 'tasks';

    //protected $guarded = [];
    // public static function find($id)
    // {

    // }
    // public static function create(array $array)
    // {
    // }



}
