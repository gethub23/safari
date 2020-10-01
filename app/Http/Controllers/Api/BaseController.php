<?php

namespace App\Http\Controllers\API;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
class BaseController extends Controller
{
    public function sendResponse($result, $message, $extraData = null)
    {
        $response = [
            'success'   => true,
            'message'   => $message,
            'data'      => $result,
            'extra'     => $extraData,
        ];

        return Response::json($response, 200);
    }

    public function sendError($result, $message = [], $extraData = null , $code = 200)
    {
        $response = [
            'success'   => false,
            'message'   => $message,
            'data'      => $result,
            'extra'     => $extraData,
        ];
        return Response::json($response, $code);
    }

    public function loadSettings()
    {
        return Response::json(Settings::all());
    }

    
}
