<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MultiplyController extends Controller
{
    public function store(Request $request)
    {
        // リクエストから数値を取得
        $number = $request->input('number');

        // 数値を10000倍する
        $result = $number * 10000;

        // 結果をレスポンスとして返す
        return response()->json(['result' => $result]);
    }
}
