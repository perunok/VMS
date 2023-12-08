<?php

use App\Http\Controllers\SystemController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function (Request $request) {
    if ($request->user()->role == 'sys') {
        return redirect('/system/dashboard');
    } elseif ($request->user()->role == 'admin') {
        return redirect('/admin/vacancy/publish');
    } elseif ($request->user()->role == 'user') {
        return redirect('/user/vacancies');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', )->group(function () {
    Route::get('/user/vacancies', [UserController::class, 'index'])->name('user.vacancies');
    Route::get('/user/my_applications', [UserController::class, 'showMyApplications'])->name('user.my_applications');
    Route::get('/job/moreinfo', [UserController::class, 'jobInfo'])->name('job.moreinfo');
    Route::get('/job/apply', [UserController::class, 'showApplyForm'])->name('job.apply');
    Route::put('/job/apply', [UserController::class, 'apply'])->name('job.apply');
    Route::get('/application/details', [UserController::class, 'applicationDetails'])->name('application.details');
    Route::get('/application/comment', [UserController::class, 'getComment'])->name('application.comment');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // User is authentication and has admin role
    Route::get('/admin/vacancy/publish', [AdminController::class, 'index'])->name('admin.vacancy.publish');
    Route::put('/admin/vacancy/publish', [AdminController::class, 'publish'])->name('admin.vacancy.publish');
    Route::get('/admin/vacancy/edit', [AdminController::class, 'showEditForm'])->name('admin.vacancy.edit');
    Route::patch('/admin/vacancy/edit', [AdminController::class, 'edit'])->name('admin.vacancy.edit');
    Route::get('/admin/vacancy/toggle_activity', [AdminController::class, 'toggleActive'])->name('admin.vacancy.toggle_activity');
    Route::get('/admin/vacancy/published', [AdminController::class, 'listPublished'])->name('admin.vacancy.published');
    Route::get('/admin/vacancy/applicants', [AdminController::class, 'listApplicants'])->name('admin.vacancy.applicants');
    Route::get('/admin/application/details', [AdminController::class, 'applicationDetails'])->name('admin.application.details');
    Route::put('/admin/application/respond', [AdminController::class, 'respondToApplication'])->name('admin.application.respond');
    Route::get('/admin/report', [AdminController::class, 'showReportsForm'])->name('admin.report');
    Route::post('/admin/report/generate', [AdminController::class, 'reports'])->name('admin.report.generate');

});


Route::middleware(['auth', 'role:sys'])->group(function () {
    Route::get('/system/dashboard', [SystemController::class, 'index'])->name('system.dashboard');
    Route::get('/system/search', [SystemController::class, 'showSearchForm'])->name('system.search');
    Route::get('/system/find', [SystemController::class, 'search'])->name('system.find');
    Route::get('/system/report', [SystemController::class, 'report'])->name('system.report');
    Route::get('/system/user/promote', [SystemController::class, 'toggleAdmin'])->name('system.user.promote');
    Route::get('/system/admin/susspend', [SystemController::class, 'toggleSusspend'])->name('system.admin.susspend');

});



require __DIR__ . '/auth.php';
