<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use App\Models\User;

class FollowUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'following_user_id'
    ];

    protected $table = 'follow_users';

    public function followings()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function followers()
    {
        return $this->belongsTo(User::class, 'following_user_id');
    }
}
