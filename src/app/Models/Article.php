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

    /**
     * 記事リストの取得
     * 
     * @param int $numPerPage 1ページあたりの表示件数
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public static function getArticleList($numPerPage = 10, $year = 0, $month = 0)
    {
        $query = self::orderBy('post_date', 'desc')->orderBy('id', 'desc');

        // 期間の指定
        if ($year) {
            if ($month) {
                $startDate = Carbon::createFromDate($year, $month, 1);
                $endDate = Carbon::createFromDate($year, $month, 1)->addMonth();
            } else {
                $startDate = Carbon::createFromDate($year, 1, 1);
                $endDate = Carbon::createFromDate($year, 1, 1)->addYear();
            }
            $query->where('post_date', '>=', $startDate->format('Y-m-d'))
                ->where('post_date', '<', $endDate->format('Y-m-d'));
        }

        return $query->paginate($numPerPage);
    }

    /**
     * 月別アーカイブの対象月リストの取得
     * @return Illuminate\Database\Eloquent\Collection Object
     */
    public static function getMonthList()
    {
        // 各月の記事数を取得
        $monthList = self::selectRaw('substring(post_date, 1, 7) AS year_and_month')
            ->groupBy('year_and_month')
            ->orderBy('year_and_month', 'desc')
            ->get();

        // 記事のある月のみ取得できるよう戻り値を作成
        foreach($monthList as $value) {
            list($year, $month) = explode('-', $value->year_and_month);
            $value->year = (int)$year;
            $value->month = (int)$month;
            $value->year_month = sprintf("%04d年%02d月", $year, $month);
        }
        return $monthList;
    }
}
