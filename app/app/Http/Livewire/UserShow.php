<?php

namespace App\Http\Livewire;

use App\Models\FollowUser;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserShow extends Component
{
    public $user;

    public function mount($id)
    {
        $this->user = User::with('articles.likes')->where('id', $id)->first();
        $this->followers = FollowUser::where('following_user_id', $id)->with('followings')->get();
        $this->followings = FollowUser::where('user_id', $id)->with('followers')->get();
        $this->checkFollow = FollowUser::where('user_id', Auth::id())->Where('following_user_id', $id)->get();
    }

    public function render()
    {
        return view('livewire.user-show')
            ->extends("layouts.app");
    }

    public function follow($user)
    {
        $id = $user['id'];
        FollowUser::create([
            'user_id' => Auth::id(),
            'following_user_id' => $id,
        ]);
        $this->mount($id);
    }

    public function removeFollow($check)
    {
        $following_id = $check['id'];
        FollowUser::destroy($following_id);
        $id = $check['following_user_id'];
        $this->mount($id);
    }

    public function like($article)
    {
        $id = $article['id'];
        Like::create([
            'user_id' => Auth::id(),
            'article_id' => $id
        ]);
        $user_id = $article['user_id'];
        $this->mount($user_id);
    }

    public function removeLike($article)
    {
        $id = $article['id'];
        Like::where([
            'user_id' => Auth::id(),
            'article_id' => $id
        ])
        ->delete();
        $user_id = $article['user_id'];
        $this->mount($user_id);
    }
}
