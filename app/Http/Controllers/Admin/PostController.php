<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ObjectLanguageTypeEnum;
use App\Enums\PostCurrencySalaryEnum;
use App\Enums\PostRemotableEnum;
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
        return view('admin.posts.index');
    }

    public function create()
    {
        $currencies=PostCurrencySalaryEnum::asArray();

        return view('admin.posts.create', [
            'currencies'=>$currencies,
        ]);
    }

    public function store(StoreRequest $request)
    {
//        dd($request);

//        $object = new Post();
//        $object->fill($request->except('_token'));  //Cách 2: chỉ lấy những thằng đã được khai báo validate
//        $object->save();
//
//        return redirect()->route('admin.posts.index');

        return $request->all();
    }

    public function importCsv(Request $request)
    {
        Excel::import(new PostImport(), $request->file('file'));

    }
}
