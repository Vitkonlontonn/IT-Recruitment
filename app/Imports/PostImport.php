<?php

namespace App\Imports;

use App\Enums\FileTypeEnum;
use App\Enums\PostStatusEnum;
use App\Models\Company;
use App\Models\File;
use App\Models\Language;
use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostImport implements ToArray, WithHeadingRow
{

    public function array(array $array): void
    {
//        dd($array);
        $i=0;
        foreach ($array as $each) {
            $i=$i+1;
            if ($each['cong_ty'] != null) {
//                dd($each);
                try {
                    $companyName = $each['cong_ty'];
                    $language = $each['ngon_ngu'];
                    $city = $each['dia_diem'];
                    $link = $each['link'];
//                    dd($each);


                    $company= Company::firstOrCreate([
                        'name' => $companyName,
//
                    ], [
                        'city' => $city,
                        'country' => 'Vietnam',
                    ]);

                    $post = Post::create([
                        'job_title' => $language . '-' . $city,
                        'company_id' => $company->id,
                        'city' => $city,
                        'status' => PostStatusEnum::ADMIN_APPROVED,
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

                } catch (\Throwable $e) {
                    dd($e);

                }
            }


        }

    }


}
