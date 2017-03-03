<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    //
    public function showHome(Request $request)
    {
        return $this->showVersion($request);
    }

    public function getVersion(Request $request)
    {
        return response()->make(env("API_VERSION"));
    }
}
