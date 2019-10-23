<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed is_published
 * @property mixed slug
 * @property mixed title
 * @property static published_at
 * @property mixed html_raw
 * @property mixed content_raw
 * @property int user_id
 * @property int category_id
 * @property int parent_id
 * @property mixed content_html
 *
 */
class BlogPost extends Model
{
    use SoftDeletes;
    const UNKNOWN_USER = 1;
    protected $fillable = [
        'title',
        'category_id',
        'user_id',
        'excerpt',
        'content_raw',
        'content_html',
        'is_published',
        'published_at',
        'slug',
        ];

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
