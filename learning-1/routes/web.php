<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\RegistrationController;
use App\Models\Student;
use Illuminate\Http\Request;
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
});

Route::get('/coding-1/{name}/{id?}', function($name, $id = null){
    $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla"); 
    $data = compact('id', 'name', 'countries');
    return view('demo')->with($data);
});

// Basic Controller
Route::get('/home', [DemoController::class, 'home']);
Route::get('/all_students', [RegistrationController::class, 'all_students']);
Route::get('/students/trash', [RegistrationController::class, 'trash']);
Route::get('/delete_student/{id}', [RegistrationController::class, 'delete_student']);
Route::get('/permanently-delete/{id}', [RegistrationController::class, 'permanently_delete_student']);
Route::get('/update_student/{id}', [RegistrationController::class, 'update_student'])->name('students.update');
Route::get('/restore_student/{id}', [RegistrationController::class, 'restore_student'])->name('students.restore');
Route::get('/register', [RegistrationController::class, 'index'])->name('students.register');
Route::post('/registration', [RegistrationController::class, 'registration']);
Route::post('/update_process/{id}', [RegistrationController::class, 'update_process']);
Route::get('/about', 'App\Http\Controllers\DemoController@about');

// Single Action Controller
Route::get('/single', SingleActionController::class);

// Reource Controller
Route::resource('/resource', ResourceController::class);

Route::get('/student', function(){
    $students = Student::all();
    print_r($students->toArray());
});


Route::get('/get-session', function(){
    debug(session()->all());
});

Route::get('/destroy-session', function(){
    session()->forget('name');
    return redirect('/get-session');
});

Route::get('/set-session', function(Request $req){
    $req->session()->put([
        'first_name' => 'Dawood', 
        'last_name' => 'Faiz', 
        'id' => '0900'
    ]);
    return redirect('/get-session');
});

Route::get('/collective-form', [RegistrationController::class, 'collective']);
Route::post('/collective-form-processing', [RegistrationController::class, 'collective_form_processing']);

Route::get('/multi-language/{lang?}', [RegistrationController::class, 'multi_language']);

Route::get('/one-to-one', [RegistrationController::class, 'one_to_one']);