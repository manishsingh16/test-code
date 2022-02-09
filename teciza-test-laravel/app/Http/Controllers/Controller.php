<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const SUCCESS = 'SUCCESS';
    const EXPECTATION_FAILDED = 'EXPECTATION_FAILED';
    const NOT_FOUND = "NOT FOUND";
    public function cres($message, $status = self::EXPECTATION_FAILDED, $data = [])
    {
        switch ($status) {
            case $status == self::SUCCESS:
                $statusCode = 200;
                break;
            case $status == self::EXPECTATION_FAILDED:
                $statusCode = 417;
                break;
            case $status == self::NOT_FOUND:
                $statusCode = 404;
        }
        return response()->json([
            'error' => $status == self::SUCCESS ? false : true,
            'message' => $message,
            'status' => $status,
            'status_code' => $statusCode,
            'data' => $data
        ], $statusCode);
    }

    public function validation(array $inputs, array $rules)
    {
        $validate = Validator::make($inputs, $rules);
        $message = "";
        if ($validate->fails()) {
            foreach ($validate->errors()->all() as $raw) {
                $message .= $raw . " ";
            }
            return $this->cres($message);
        } else {
            return false;
        }
    }
}
