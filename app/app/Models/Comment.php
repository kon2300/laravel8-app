<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'article_id',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
