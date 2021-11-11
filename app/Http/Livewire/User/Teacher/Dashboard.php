<?php

namespace App\Http\Livewire\User\Teacher;

use App\Models\AssignTeacher;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {

        $returnData = AssignTeacher::with('teacher')->where('teacher_id', '=',Auth::user()->id)->get();
        // dd($returnData);
        return view('livewire.user.teacher.dashboard', [
            'returnData' => $returnData
        ]);
    }
}
