<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ObjectLanguageTypeEnum;
use App\Enums\PostCurrencySalaryEnum;
use App\Enums\PostRemoteableEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Http\Controllers\SystemConfigController;
use App\Http\Requests\Post\StoreRequest;
use App\Imports\PostImport;
use App\Models\Company;
use App\Models\ObjectLanguage;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;

class PostController extends Controller
{
    private object $model;
    private string $table;

    public function __construct()
    {
        $this->model = Post::query();
        $this->table = (new Post())->getTable();

        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function index()
    {
        $data = $this->model->get();
        $posts= Post::query()->paginate();
        return view('admin.posts.index', [
            'posts'=>$posts]);
    }

    public function create()
    {
        $currencies = PostCurrencySalaryEnum::asArray();

        return view('admin.posts.create', [
            'currencies' => $currencies,
        ]);
    }

    public function store(StoreRequest $request)
    {


        $object = new Post();

        $name_company = $request['company'];
        $company_id = DB::table('companies')->where('name', $name_company)->first()->id;
        if ($request->has('remoteable')) {
            $remoteable = 1;
        } else {
            $remoteable = 0;
        }

        if ($request->has('part_time')) {
            $part_time = 1;
        } else {
            $part_time = 0;
        }

        $object->user_id = 1;
        $object->job_title = $request['job_title'];
        $object->city = $request['city'];
        $object->district = $request['district'];
        $object->part_time = $part_time;
        $object->company_id = $company_id;
        $object->remoteable = $remoteable;
        $object->min_salary = $request['min_salary'];
        $object->max_salary = $request['max_salary'];
        $object->currency_salary = $request['currency_salary'];
        $object->requirement = $request['requirement'];
        $object->start_date = $request['start_date'];
        $object->end_date = $request['end_date'];
        $object->save();
//

        $languages = $request->get('languages');
        foreach ($languages as $language) {
            ObjectLanguage::create([
                'language_id' => $language,
                'object_id' => $object->id,
                'object_type' =>1,
            ]);
        }
        return redirect()->route('admin.posts.index');


    }


    public function importCsv(Request $request)
    {
        Excel::import(new PostImport(), $request->file('file'));

    }
    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }

}
