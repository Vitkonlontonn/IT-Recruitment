<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Post;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    private object $model;
    private string $table;

    public function __construct()
    {
        $this->model = Report::query();
        $this->table = (new Report())->getTable();
    }

    public function index()
    {
        $data = Report::query()->get();
        return view("admin.applies.index", [
            'data' => $data,
        ]);

    }

    public function approve(Request $request)
    {
        $id = $request->query('id');
        $report = Report::find($id);
        $report->status = 1;
        $report->save();
        return redirect('/admin/applies');
    }

    public function view(request $request)
    {
        $id = $request->query('id');
        $report = Report::find($id);
        $post = Post::find($report->reported_id);
        $company = Company::find($post->company_id);
        $user = User::find($report->user_id);
        return view("admin.applies.view", [
            'report' => $report,
            'post' => $post,
            'company' => $company,
            'user'=> $user,
        ]);

    }
}
