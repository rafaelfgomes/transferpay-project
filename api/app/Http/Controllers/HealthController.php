<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class HealthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(): JsonResponse
    {

        $data = [
            'status' => Response::HTTP_OK,
            'message' => 'Ok',
        ];

        return new JsonResponse([ $data ]);
    }
}
