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
        $zipcode= ZipCode::search($codigo)->raw()['hits'][0];

        if ($codigo != $zipcode['zip_code']) abort(404);

        $zipcode['zip_code'] = strlen($codigo) < 5 ? "0".$codigo : $codigo;
        return  $zipcode;
    }
}
