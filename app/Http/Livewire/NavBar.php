<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NavBar extends Component
{
    
    public function logoutUser()
    {
        Auth::logout();
        
        redirect('/');
    }
    public function render()
    {
        return view('livewire.nav-bar');
    }
}