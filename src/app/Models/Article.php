<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = ['post_date', 'recommended', 'title', 'body'];

    protected $dates = ['post_date', 'created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'recommended' => 'integer',
    ];

    /**
     * post_dateのアクセサフォーマット
     * @return string
     */
    public function getPostDateTextAttribute()
    {
        return $this->post_date->format('Y/m/d');
    }

    /**
     * post_dateのミューテタフォーマット
     * @param $value 日付
     */
    public function setPostDateAttribute($value)
    {
        $post_date = new Carbon($value);
        $this->attributes['post_date'] = $post_date->format('Y-m-d');
    }
}
