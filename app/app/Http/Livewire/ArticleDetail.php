<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ArticleDetail extends Component
{
    public $article;
    public $content;

    protected $rules = [
        'content' => 'required|max:100'
    ];


    public function mount($id)
    {
        $this->article = Article::with('user', 'likes', 'comments.user')->where('id', $id)->first();
    }

    public function render()
    {
        $this->content = '';
        return view('livewire.article-detail')
            ->extends('layouts.app');
    }

    public function comment($article)
    {
        $this->validate();

        $id = $article['id'];
        Comment::create([
            'user_id' => Auth::id(),
            'article_id' => $id,
            'content' => $this->content,
        ]);
        $this->mount($id);
    }

    public function like($article)
    {
        $id = $article['id'];
        Like::create([
            'user_id' => Auth::id(),
            'article_id' => $id
        ]);
        $this->mount($id);
    }

    public function removeLike($article)
    {
        $id = $article['id'];
        Like::where([
            'user_id' => Auth::id(),
            'article_id' => $id
        ])
        ->delete();
        $this->mount($id);
    }

    public function removeComment($comment)
    {
        $id = $comment['id'];
        Comment::destroy($id);
        $article_id = $comment['article_id'];
        $this->mount($article_id);
    }
}
