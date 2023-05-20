<?php

namespace App\Http\Controllers\Applicant;

use App\Enums\SystemCacheKeyEnum;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(Request $request)
    {
//        \DB::enableQueryLog();
//            $post = Post::with('languages')->find(34);
//            dd($post->languages->toArray());
//        dd(\DB::getQueryLog());
        //

        $searchCities = $request->get('cities', []);


        $arrCity = cache()->remember(
            SystemCacheKeyEnum::POST_CITIES,
            60 * 60 * 60 * 24 * 30,
            function () {
                $cities = Post::query()
                    ->pluck('city');
                $arrCity = [];
                foreach ($cities as $city) {
                    if (empty($city)) {
                        continue;
                    }
                    $arr = explode(',', $city);
                    foreach ($arr as $item) {
                        if (in_array($item, $arrCity)) {
                            continue;
                        }
                        $arrCity[] = $item;
                    }
                }
                return $arrCity;

            }
        );

        $query = Post::query()
            ->with(['languages',
                'company' => function ($q) {
                    return $q->select([
                        'id',
                        'name',
                        'logo'
                    ]);
                }
            ])
            ->latest();

        if (!empty($searchCities)) {
            $query->where(function ($q) use ($searchCities) {
                foreach ($searchCities as $searchCity) {
                    $q->orWhere('city', 'like', '%' . $searchCity . '%');
                }
                $q->orWhereNull('city');
                return $q;
            });

        }
        $posts = $query->paginate();

//        dd($posts->toArray());
        return view('applicant.index', [
            'posts' => $posts,
            'cities' => $arrCity,
            'searchCities' => $searchCities,
        ]);
    }
}
