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

    public function index()
    {
        $data = $this->model->paginate();
        foreach ($data as $each) {

            $each->currency_salary = $each->curent_salary_code;
            //Ghi đè attribute Status(enum) cũ bằng Status_name(string) (từ file Model/Post)
            //status_name không hề đc khai báo, Laravel tự động lấy theo tên function mà mình đặt
            //=> không dc đặt linh tinh
            $each->status = $each->status_name;

        }
        return response()->json([
            'success' => true,
            'data' => $data->getCollection(),
            'pagination' => $data->linkCollection()
        ]);

    }


}
