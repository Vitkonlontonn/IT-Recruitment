<?php

namespace App\Models;

use App\Enums\ObjectLanguageTypeEnum;
use App\Enums\PostCurrencySalaryEnum;
use App\Enums\PostStatusEnum;
use App\Enums\SystemCacheKeyEnum;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'company_id',
        'job_title',
        'city',
        'status',
        "district",
        "remotable",
        "can_parttime",
        "min_salary",
        "max_salary",
        "currency_salary",
        "requirement",
        "start_date",
        "end_date",
        "number_applicants",
        "status",
        "is_pinned",
        "slug",
    ];

    protected static function booted()
    {
        static::creating(static function ($object) {
            // $object->user_id = auth()->id();
            $object->user_id = 1;
            $object->status = 1;
        });

        //dạng như bắt sự kiện khi saved(create or update)
        // static::saved(static function ($object) {
        //     $city = $object->city;
        //     $arr = explode(',', $city);
        //     $arrCity = cache()->remember(
        //         SystemCacheKeyEnum::POST_CITIES,
        //         60 * 60 * 60 * 24 * 30,
        //         function () {
        //             $cities = Post::query()
        //                 ->pluck('city');
        //             $arrCity = [];
        //             foreach ($cities as $city) {
        //                 if (empty($city)) {
        //                     continue;
        //                 }
        //                 $arr = explode(',', $city);
        //                 foreach ($arr as $item) {
        //                     if (in_array($item, $arrCity)) {
        //                         continue;
        //                     }
        //                     $arrCity[] = $item;
        //                 }
        //             }
        //             return $arrCity;

        //         }
        //     );

        //     foreach ($arr as $item) {
        //         if (in_array($item, $arrCity)) {
        //             continue;
        //         }
        //         $arrCity[] = $item;
        //     }
        //     cache()->put( SystemCacheKeyEnum::POST_CITIES, $arrCity);
        // });
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'job_title'
            ]
        ];
    }

    public function getCurrencySalaryCodeAttribute()
    {
        return PostCurrencySalaryEnum::getKeys($this->currency_salary);
    }

    public function getStatusNameAttribute()
    {
        return PostStatusEnum::getKeys($this->status);
    }

    //Lấy languages từ 1 post
    //dựa vào bảng pivot object_language
    //many to many
    public function languages()
    {
        return $this->belongsToMany(
            Language::class,
            'object_language',
            'object_id',
            'language_id'
        );
    }
    public function getLanguagesAttribute()
    {
        return $this->belongsToMany(
            Language::class,
            'object_language',
            'object_id',
            'language_id'
        );
    }

    //one to many
    public function company()
    {
        return $this->belongsTo(
            Company::class
        );
    }

    public function getLocationAttribute()
    {
        if (!empty($this->district)) {
            return $this->district . ' - ' . $this->city;
        } else return $this->city;
    }
}
