<?php

//File này để copy sang các Controller khác cho dễ
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class TestController extends Controller
{private object $model;
    private string $table;

    public function __construct()
    {
        $this->model = User::query();
        $this->table = (new User())->getTable();

        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function test()
    {
        // return DB::getSchemaBuilder()->getColumnListing('companies');
        $companyName = 'Da cap';
        $language    = 'PHP, Java';
        $city        = 'HN';
        $link        = 'abc';

        $company = Company::firstOrCreate([
            'name' => $companyName,
        ], [
            'city'    => $city,
            'country' => 'Vietnam',
        ]);

        $post = Post::create([
            'job_title'  => $language,
            'company_id' => $company->id,
            'city'       => $city,
            'status'     => PostStatusEnum::ADMIN_APPROVED,
        ]);

        $languages = explode(',', $language);
        foreach ($languages as $language) {
            Language::firstOrCreate([
                'name' => trim($language),
            ]);
        }

        File::create([
            'post_id' => $post->id,
            'link' => $link,
            'type' => FileTypeEnum::JD,
        ]);
    }

}
