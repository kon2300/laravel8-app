<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserEdit extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|max:20',
    ];

    public function mount($id)
    {
        $this->user = User::find($id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function render()
    {
        return view('livewire.user-edit')
            ->extends('layouts.app');
    }
    public function update()
    {
        $this->validate();
        session()->flash('message', '編集しました');
        User::find($this->user->id)
            ->update([
                'name' => $this->name,
            ]);
        return redirect(route('user.show', [$this->user->id]));
    }

}
