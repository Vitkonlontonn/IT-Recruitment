<?php


namespace App\Http\Controllers;

trait ResponseTrait
{
    public function successResponse($data, $message)
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'pagination' => $message,
        ]);
    }
    public function errorResponse( $message)
    {
        return response()->json([
            'success' => false,
            'data' => [],
//            'pagination' => $data->linkCollection(),
        ],400);
    }

}
