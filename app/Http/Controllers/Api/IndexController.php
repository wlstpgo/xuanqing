<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index()
    {
        return view('api.index');
    }

    public function index_d()
    {
        return view('api_d.index');
    }
}
