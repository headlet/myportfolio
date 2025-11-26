<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;

Route::get('/', [UserController::class, 'indexdata']);
Route::post('/message', [ContactController::class, 'store'])->name("message");
Route::get('/allproject', [UserController::class, 'project'])->name('allproject');
Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::view('/admins', 'layout.admin.admin');

    //user route
    Route::get('/profiles', [UserController::class, 'index'])->name('profile');
    Route::put('/profiles/{user}', [UserController::class, 'update'])->name('userupdate');


    //Skills routes
    Route::get('/skills', [SkillController::class, 'index'])->name('skills');
    Route::get('/skills/create', [SkillController::class, 'create_form'])->name('skills.create');
    Route::post('/skills/create', [SkillController::class, 'store']);
    Route::get('/skills/edit/{id}', [SkillController::class, 'edit'])->name('skills.edit');
    Route::put('/skills/edit/{id}', [SkillController::class, 'update'])->name('skills.update');
    Route::delete('/skills/{skills}', [SkillController::class, 'destroy'])->name('skills.delete');

    //Project routes
    Route::get('/projects', [ProjectController::class, 'index'])->name('project');
    Route::get('/projects/create', [ProjectController::class, 'create_form'])->name('projects.create');
    Route::post('/projects/create', [ProjectController::class, 'create']);
    Route::get('/projects/edit/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/edit/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::get('/projects/view/{id}', [ProjectController::class, 'show'])->name('projects.show');
});
