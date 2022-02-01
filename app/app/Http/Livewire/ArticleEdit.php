<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleEdit extends Component
{
    public $title;
    public $category;
    public $content;

    protected $rules = [
        'title' => 'required|max:50',
        'category' => 'required',
        'content' => 'required|max:255'
    ];

    public function mount($id)
    {
        $this->article = Article::find($id);
        $this->title = $this->article->title;
        $this->category = $this->article->category;
        $this->content = $this->article->content;
    }

    public function render()
    {
        return view('livewire.article-edit')
            ->extends('layouts.app');
    }
    public function update()
    {
        $this->validate();
        session()->flash('message', '編集しました');
        Article::find($this->article->id)
            ->update([
                'title' => $this->title,
                'category' => $this->category,
                'content' => $this->content,
            ]);
        return redirect(route('article.detail', [$this->article->id]));
    }

    public function remove()
    {
        Article::destroy($this->article->id);
        session()->flash('message', '削除しました');
        return redirect(route('article.show'));
    }
}
