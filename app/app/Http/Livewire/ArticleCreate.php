<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ArticleCreate extends Component
{
    public $title;
    public $category;
    public $comment;

    protected $rulus = [
        '$title' => 'required|max:50',
        '$category' => 'required',
        '$comment' => 'required|max:300'
    ];

    public function store()
    {
        $this->validate();
        session()->flash('message', '入力内容に誤りがあります');
    }

    public function render()
    {
        return view('livewire.article-create')
            ->extends('layouts.app');
    }
}
