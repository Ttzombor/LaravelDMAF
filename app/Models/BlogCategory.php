<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    public $fillable = array('title', 'parent_id', 'slug', 'description', 'id');
}
