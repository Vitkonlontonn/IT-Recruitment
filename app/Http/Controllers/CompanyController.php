<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CompanyController extends Controller
{
    use ResponseTrait;

    private object $model;

    public function __construct()
    {
        $this->model = Company::query();
    }

    public function index(Request $request)
    {
        $data = $this->model
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->get();
        return $data;
    }
}
