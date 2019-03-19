<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['post_date', 'title', 'body'];

    protected $dates = ['post_date', 'created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'recommended' => 'integer',
    ];
}
