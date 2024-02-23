<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeddingEstimateController extends Controller
{
    public function store(Request $request)
    {
        // 各項目の金額設定
        $ceremonyStyles = ['チャペル式' => 620000, '神前式' => 650000];
        $bouquetStyles = ['ベーシックブーケ' => 0, 'プレミアムブーケ' => 20000];
        $dressStyles = ['洋装１点' => 300000, '洋装２点' => 400000, '洋装2点＋和装1点' => 720000];

        // リクエストから各項目を取得
        $ceremonyStyle = $request->input('ceremonyStyle');
        $guestCount = $request->input('guestCount');
        $bouquetStyle = $request->input('bouquetStyle');
        $dressStyle = $request->input('dressStyle');

        // 合計金額の計算
        $total = 0;
        $total += $ceremonyStyles[$ceremonyStyle] ?? 0;
        $total += $guestCount * 7000; // 人数に応じた金額
        $total += $bouquetStyles[$bouquetStyle] ?? 0;
        $total += $dressStyles[$dressStyle] ?? 0;

        // 合計金額をレスポンスとして返す
        return response()->json(['total' => $total]);
    }
}
