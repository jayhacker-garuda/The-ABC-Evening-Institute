<?php

namespace App\Http\Livewire\User\Login;

use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Livewire\Component;

class LoginForm extends Component
{
    public User $user;
    public $password;

    protected $rules = [
        'user.email' => 'required|email',
        'password' => 'required|min:8',
    ];

    public function updated($param)
    {
        $this->validateOnly($param);
    }

    public function donUserLogin()
    {
        // $userData = $this->validate();
        // dd($userData);
        if(FacadesAuth::attempt(['email' => $this->user->email, 'password' => $this->password])) {

            if(FacadesAuth::user()->user_type === 'teacher') {

                return redirect(route('teacher.dashboard'));
            }elseif(FacadesAuth::user()->user_type === 'student'){

                return redirect(route('student.dashboard'));
            }
        }
        session()->flash('error', 'These Credentials are incorrect');
    }

    public function mount()
    {
        $this->user = new User;
    }
    public function render()
    {
        return view('livewire.user.login.login-form');
    }
}
