<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleShow extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category = '';
    public $type = '';
    public $result = '';
    protected $articles;

    protected $queryString = [
        'category' => ['expect' => ''],
        'type' => ['expect' => '']
    ];

    public function render()
    {
        $this->search();
        return view('livewire.article-show', [
            'articles' => $this->articles,
        ])
            ->extends('layouts.app');
    }

    public function like($article)
    {
        $id = $article['id'];
        Like::create([
            'user_id' => Auth::id(),
            'article_id' => $id
        ]);
        $this->render();
    }

    public function removeLike($article)
    {
        $id = $article['id'];
        Like::where([
            'user_id' => Auth::id(),
            'article_id' => $id
        ])
        ->delete();
        $this->render();
    }

    public function search()
    {
        $category = $this->category;

        if ($category === 'fun') {
            $this->result = '楽しい話';
        } elseif($category === 'angry') {
            $this->result = '怒った話';
        } elseif($category === 'sad') {
            $this->result = '悲しい話';
        }

        if ($this->type === 'new' || $this->type === '') {
            $this->articles = Article::with('user', 'likes')->where('category','like', '%'.$category.'%')->latest()->paginate(6);
        } elseif ($this->type === 'old') {
            $this->articles = Article::with('user', 'likes')->where('category','like', '%'.$category.'%')->oldest()->paginate(6);
        } elseif ($this->type === 'many') {
            $this->articles = Article::withCount('user', 'likes')->where('category','like', '%'.$category.'%')->orderBy('likes_count', 'desc')->paginate(6);
        } elseif ($this->type === 'few') {
            $this->articles = Article::withCount('user', 'likes')->where('category','like', '%'.$category.'%')->orderBy('likes_count', 'asc')->paginate(6);
        }
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function updatingType()
    {
        $this->resetPage();
    }
}
