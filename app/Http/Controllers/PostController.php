<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\View;

//Controller naỳ sẽ chỉ lấy data và phục vụ cho route ('api')
//Dùng chung cho các role

class PostController extends Controller
{
    private object $model;


    public function __construct()
    {
        $this->model = Post::query();
    }

    public function index(): JsonResponse
    {
        $data = $this->model->paginate();
        foreach ($data as $each) {
            $each->currency_salary = $each->currency_salary_code;
            $each->status          = $each->status_name;
        }

        return response()->json([
            'success'    => true,
            'data'       => $data->getCollection(),
            'pagination' => $data->linkCollection()
        ]);
    }


}
