<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->id))
        {
            $param = ['id' => $request->id];
            $items = DB::select('select * from people where id = :id', $param);
            return view('hello.index', ['items' => $items]);
        } else {
            $items = DB::select('select * from people');
        }

        return view('hello.index', ['items' => $items]);
    }
}