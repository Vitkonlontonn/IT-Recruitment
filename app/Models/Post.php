<?php

namespace App\Models;

use App\Enums\PostCurrencySalaryEnum;
use App\Enums\PostStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

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
}
