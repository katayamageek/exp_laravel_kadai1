<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    // 追加（Userモデルとの関連）
    protected $fillable = ['tweet'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔽 追加
    public function liked()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
