<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SchoolRegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentListController;
use App\Http\Controllers\StaffDataController;
use App\Http\Controllers\DailySpendController;
use App\Http\Controllers\StudentMarksheetController;
use App\Http\Controllers\MarksheetExtraController;
use App\Http\Controllers\PrintMarksheet;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TransportFeesController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SchoolProfileController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\CsvUploadController;
use App\Http\Controllers\TransferStudentController;


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

Route::get('/',[IndexController::class,'index']);
Route::post('/',[IndexController::class,'login'])->name('login');
Route::get('/logout',[IndexController::class, 'logout'])->name('logout');

Route::get('/register',[SchoolRegisterController::class,'register']);
Route::post('/register',[SchoolRegisterController::class,'store']);

Route::middleware(['custom_auth'])->group(function () {  //write your routes here
Route::get('/home', [HomeController::class, 'index']);
Route::get('/delete_home/{id}', [HomeController::class, 'delete']);

Route::get('/student_list', [StudentListController::class, 'index']);
Route::post('/year/{selectedYear}', [StudentListController::class, 'year']);
Route::get('/add_student', [StudentListController::class, 'create']);
Route::post('/add_student', [StudentListController::class, 'store']);
Route::get('/student_details{id}', [StudentListController::class, 'showStudentDetails']);
Route::get('/update_student{id}', [StudentListController::class, 'edit']);
Route::post('/update_student{id}', [StudentListController::class, 'update']);
Route::get('/delete_student{id}', [StudentListController::class, 'deleteStudentDetails']);

Route::get('/staff_data', [StaffDataController::class, 'index']);
Route::get('/add_staff', [StaffDataController::class, 'create']);
Route::post('/add_staff', [StaffDataController::class, 'store']);
Route::get('/staff_details{id}', [StaffDataController::class, 'showStaffDetails']);
Route::get('/update_staff{id}', [StaffDataController::class, 'edit']);
Route::post('/update_staff{id}', [StaffDataController::class, 'update']);
Route::get('/delete_staff{id}', [StaffDataController::class, 'delete']);

Route::get('/daily_spend', [DailySpendController::class, 'index']);
Route::post('/daily_spend', [DailySpendController::class, 'store']);
Route::get('/delete/{id}', [DailySpendController::class, 'delete']);

Route::get('/student_marksheet', [StudentMarksheetController::class, 'index']);
Route::get('/add_marksheet{id}', [StudentMarksheetController::class, 'add'])->name('marksheet.index');
Route::post('/add_marksheet/{id}', [StudentMarksheetController::class, 'store']);
Route::post('/add_marksheet_extra/{id}', [MarksheetExtraController::class, 'storeExtra']);

Route::get('/print_marksheet/{id}', [PrintMarksheet::class, 'print']);


Route::get('/setting', [SettingController::class, 'index']);
Route::post('/setting', [SettingController::class, 'store']);
Route::get('/setting/{id}', [SettingController::class, 'delete']);

Route::get('/transport_fees', [TransportFeesController::class, 'index']);
Route::post('/transport_fees', [TransportFeesController::class, 'store']);
Route::get('/transport_fees/{id}', [TransportFeesController::class, 'delete']);

Route::get('/subject', [SubjectController::class, 'index']);
Route::post('/subject', [SubjectController::class, 'store']);
Route::get('/subject/{id}', [SubjectController::class, 'delete']);

Route::get('/school_profile', [SchoolProfileController::class, 'index']);
Route::post('/school_profile', [SchoolProfileController::class, 'updateDetail']);
Route::post('/school_pass', [SchoolProfileController::class, 'updatePassword']);


Route::get('/filter', [DataController::class, 'index']);
Route::post('/filter', [DataController::class, 'filterStudents'])->name('filter.students');

Route::get('/csv_upload', [CsvUploadController::class, 'index'])->name('upload.csv');
Route::post('/csv_upload', [CsvUploadController::class, 'csv_upload'])->name('upload.csv');

Route::get('/transfer_student', [TransferStudentController::class, 'transfer_student']);
Route::get('/updateStudentClass', [TransferStudentController::class, 'updateStudentClass']);

});