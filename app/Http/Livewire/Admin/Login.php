<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
      'email' => 'required',
      'password' => 'required|min:8'
    ];


    public function updated($param)
    {
        $this->validateOnly($param);
    }

    public function donAdminLogin()
    {
        $adminData = $this->validate();

        if(Auth::attempt($adminData)) {

            if(Auth::user()->user_type === 'admin') {

                return redirect(route('admin.dashboard'));
            }else{

                $this->redirect('/');
            }
        }
        session()->flash('error', 'These Credentials are incorrect');
    }

    public function render()
    {
        return view('livewire.admin.login');
    }
}