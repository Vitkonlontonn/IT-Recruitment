<?php

namespace App\Http\Controllers\Applicant;

use App\Enums\SystemCacheKeyEnum;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Post;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomePageController extends Controller
{
    public function index(Request $request)
    {
//        $user = $request->session()->get('user');
        $user = Session::get('user');
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
        $searchRemote = 0;
        $searchPartTime = 0;
        if ($request->has('remote')) {
            $query->where('remoteable', 1);
            $searchRemote = 1;
        }

        if ($request->has('part_time')) {
            $query->where('part_time', 1);
            $searchPartTime = 1;
        }

        $minSalary = 100;
        $maxSalary = 10000;
        if ($request->has('min_salary')) {
            $minSalary = $request->get('min_salary');
            $maxSalary = $request->get('max_salary');

            if ($maxSalary != 10000 || $minSalary != 100) {
                $query->where('min_salary', '>=', $minSalary)
                    ->where('max_salary', '<=', $maxSalary);
            }
        }
        $posts = $query->paginate();
        return view('applicant.index', [
            'posts' => $posts,
            'cities' => $arrCity,
            'searchCities' => $searchCities,
            'searchPartTime' => $searchPartTime,
            'searchRemote' => $searchRemote,
            'minSalary' => $minSalary,
            'maxSalary' => $maxSalary,
            'user' => $user
        ]);
    }

    public function show($postId)
    {
        $post = Post::query()
            ->find($postId);

        return view('applicant.show', [
            'post' => $post,
        ]);

    }

    public function company($companyId)
    {
        $company = Company::query()
            ->find($companyId);
        $posts = Post::where('company_id', $companyId)->get();
//        dd($posts);
        return view('applicant.company', [
            'company' => $company,
            'posts' => $posts,
        ]);

    }

    public function apply($postId)
    {
        $user = Session::get('user');
        return view('applicant.apply', [
            'postId' => $postId,
            'user' => $user
        ]);
    }

    public function appling(Request $request)
    {
        $post_id = $request->get('post_id');
        $user = Session::get('user');
        $link = $request->file('link');
        $user->link = $link;
        $user->save();
        $apply = new Report();
        $apply->user_id = $user->id;
        $apply->reported_id = $post_id;
        $apply->save();
        return redirect()->route('applicant.index');
    }

    public function profile(Request $request)
    {
        $user1 = Session::get('user');
        $user = User::find($user1->id);
        $posts = $user->posts;
//        dd($posts);
        return view("applicant.profile", [
            'user' => $user,
            'posts' => $posts,
        ]);

    }
}
