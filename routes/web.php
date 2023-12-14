<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Models\Exam;
use App\Models\ExamDate;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/exam-date', function () {
//     return view('exam-date');
// });
Route::get('/verify-password-taks', function () {
    return view('verify-password-taks');
});
Route::post('/verify-password-taks', [ExamController::class, 'getExamDatesTaks'])->name('exam.getExamDatesTaks');
Route::post('/store-exam-taks', [ExamController::class, 'storeTaks'])->name('exam.storeTaks');

Route::get('/verify-password-coptic', function () {
    return view('verify-password-coptic');
});
Route::post('/exam-date-coptic', [ExamController::class, 'getExamDatesCoptic'])->name('exam.getExamDatesCoptic');
Route::post('/store-exam-coptic', [ExamController::class, 'storeCoptic'])->name('exam.storeCoptic');

Route::get('/verify-password-alhan', function () {
    return view('verify-password-alhan');
});
Route::post('/exam-date-alhans', [ExamController::class, 'getExamDatesAlhan'])->name('exam.getExamDatesAlhan');
Route::post('/store-exam-alhan', [ExamController::class, 'storeAlhan'])->name('exam.storeAlhan');

Route::get('/verify-password-agbia', function () {
    return view('verify-password-agbia');
});
Route::post('/exam-date-agbia', [ExamController::class, 'getExamDatesAgbia'])->name('exam.getExamDatesAgbia');
Route::post('/store-exam-agbia', [ExamController::class, 'storeAgbia'])->name('exam.storeAgbia');

Route::post('/delete-exam-date', [ExamController::class, 'deleteExamDate'])->name('exam.deleteExamDate');
// Route::get('delete-date', function () {
//     return view('delete-exam-date');
// });

Route::get('/table-exam-date-taks', [ExamController::class, 'getTableExamDatesTaks'])->name('exam.getTableExamDatesTaks');
Route::get('/table-exam-date-coptic', [ExamController::class, 'getTableExamDatesCoptic'])->name('exam.getTableExamDatesCoptic');
Route::get('/table-exam-date-alhan', [ExamController::class, 'getTableExamDatesAlhan'])->name('exam.getTableExamDatesAlhan');
Route::get('/table-exam-date-agbia', [ExamController::class, 'getTableExamDatesAgbia'])->name('exam.getTableExamDatesAgbia');


Route::get('/verify-password', function () {
    return view('verify-password');
});
Route::post('/verify-password', [ExamController::class, 'verifyPassword'])->name('exam.verifyPassword');

Route::get('/student-dates', function () {
    return view('student-dates');
});

Route::post('/student-dates', [ExamController::class, 'getStudentDates'])->name('exam.getStudentDates');

Route::get('/exam-date-taks', function () {
    return view('end-exam');
});
Route::get('/exam-date-alhan', function () {
    return view('end-exam');
});
Route::get('/exam-date-coptic', function () {
    return view('end-exam');
});
Route::get('/exam-date-agbia', function () {
    return view('end-exam');
});