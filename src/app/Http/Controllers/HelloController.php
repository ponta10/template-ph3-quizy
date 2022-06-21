<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;

class HelloController extends Controller
{
    // public function index($id = 'noname', $pass = 'unknown'){
    //     return <<<EOF
    // <html>
    // <head>
    // <title>Hello/Index</title>
    // <style>
    // body{ font-size:16pt; color:#999; 
    // }
    // h1{ font-size:100pt; text-align:right; color:#eee; 
    //     margin: -40px 0px -50px 0px;
    // }
    // </style>
    // </head>
    // <body>
    //     <h1>Index</h1>
    //     <p>これは、Helloコントローラーのindexアクションです。</p>
    //     <ul>
    //         <li>ID: {$id}</li>
    //         <li>PASS: {$pass}</li>
    //     </ul>
    // </body>
    // </html>
    // EOF;
    // }

    //コントローラでテンプレート
    // public function index($id = 'zero'){
    //     $data = ['msg' => 'これはコントローラから渡されたメッセージです。',
    //             'id' =>  $id
    // ];
    //     return view('hello.index',$data);
    // }

    //bladeでテンプレート
    // public function index(){
    //     $data = [
    //         'msg' => 'これはbladeを利用したサンプルです。',
    //     ];
    //     return view('hello.index',$data);
    // }

    //フォーム送信
    public function index(){
        $data = [
            'msg' => 'お名前を入力してください',
        ];
        return view('hello.index',$data);
    }

    public function post(Request $request){
        $msg = $request->msg;
        $data = [
            'msg' =>'こんにちは' . $msg . 'さん！',
        ];
        return view('hello.index',$data);
    }
}
