<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ArticleCreate extends Component
{
    public $title;
    public $category;
    public $content;
    public $user = [];

    protected $rules = [
        'title' => 'required|max:50',
        'category' => 'required',
        'content' => 'required|max:255'
    ];

    public function store()
    {
        $this->validate();
        session()->flash('message', '投稿しました');
        Article::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'category' => $this->category,
            'content' => $this->content,
        ]);
        return redirect(route('article.show'));
    }

    public function render()
    {
        return view('livewire.article-create')
            ->extends('layouts.app');
    }
}
