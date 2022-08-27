<?php

namespace App\Http\Controllers;

use App\Models\ZipCode;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke($codigo)
    {
        $zipcode = ZipCode::with('municipality','settlements')->find($codigo);
        if(!$zipcode) abort(404);
        $zipcode->zip_code = $zipcode->zip_code < 10000 ? "0".$zipcode->zip_code : $zipcode->zip_code;
        return json_encode($zipcode,JSON_UNESCAPED_UNICODE);
    }
}
