<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo(BlogCategory::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
