<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ArticleDetail extends Component
{
    public function render()
    {
        return view('livewire.article-detail')
            ->extends('layouts.app');
    }
}
