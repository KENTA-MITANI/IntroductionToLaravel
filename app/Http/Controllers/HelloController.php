<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->query(), [
            'id' => 'required',
            'pass' => 'email',
        ]);

        if($validator->fails()) {
            $msg = 'クエリーに問題があります。';
        } else {
            $msg = 'ID/PASSを受け付けました。フォームを入力してください。';
        }
        return view('hello.index', ['msg'=>$msg,]);
    }

    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ]);

        if($validator->fails()) {
            return redirect('/hello')
                        ->withErrors($validator)
                        ->withInput();
        }

        return view('hello.index',['msg' => '正しく入力されました！']);
    }
}