<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['content' , 'status'];//想定外のデータが代入されるのを防ぎ、かつ一気にデータを代入できるように。
}
