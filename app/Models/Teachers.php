<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    protected $table = 'teacher';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'img', 'material', 'email', 'mobile'];
    use HasFactory;
}
