<?php

use App\Http\Livewire\Admin\Course\AssignCourse;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Login;
use App\Http\Livewire\User\Student\Dashboard as StudentDashboard;
use App\Http\Livewire\User\Teacher\Dashboard as TeacherDashboard;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('login');


Route::get('/admin/login', Login::class)->name('admin.login');

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', Dashboard::class)->name('admin.dashboard');
    Route::get('/admin/course/teacher', AssignCourse::class)->name('admin.assign.teacher');
});

Route::middleware(['auth', 'teacher'])->group(function () {
    Route::get('/teacher/dashboard', TeacherDashboard::class)->name('teacher.dashboard');
});
Route::middleware(['auth', 'student'])->group(function () {
    Route::get('/student/dashboard', StudentDashboard::class)->name('student.dashboard');
});