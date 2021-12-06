<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\QuestionController;

use App\Models\Question;
use App\Models\Answer;

Route::redirect('/', 'login');

Route::get('/dashboard', [ClassroomController::class, 'index'])->name('dashboard');
Route::get('/profile/update', [PasswordController::class, 'index'])->name('profile.password');
Route::post('/profile/update', [PasswordController::class, 'store'])->name('profile.password.update');
Route::resource('/classroom', ClassroomController::class);
Route::get('/archive/classroom', [ClassroomController::class, 'archiveClassroomIndex'])->name('archive-classroom-index');
Route::get('/archive/classroom/{classroom}', [ClassroomController::class, 'archiveClassroom'])->name('archive-classroom');
Route::get('/archive/classroom/{classroom}/unarchive', [ClassroomController::class, 'unarchiveClassroom'])->name('unarchive-classroom');
Route::get('/classroom/remove-student/{classroom}/{user}', [ClassroomController::class, 'removeStudent'])->name('unenroll.student');
Route::get('/open-attendance/{classroom}', [AttendanceController::class, 'openAttendance'])->name('open.attendance');
Route::get('/close-attendance/{classroom}', [AttendanceController::class, 'closeAttendance'])->name('close.attendance');
Route::post('/question/ask/{classroom}', [QuestionController::class, 'store'])->name('ask.question');

Route::get('/attendance-list/{classroom}',[AttendanceController::class, 'attendanceList'])->name('attendance-classroom');
Route::get('/attendance/users/{attendance}',[AttendanceController::class, 'attendanceUser'])->name('attendance-users');

Route::get('classroom-questions/all/{classroom}', [ClassroomController::class, 'showQuestion'])->name('question-all');

require __DIR__.'/auth.php';
