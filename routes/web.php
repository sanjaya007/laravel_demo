<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CustomerController;

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

// normally 
// Route::get('/', function () {
//     return view('index');
// });

// normally 
Route::get("/demo/{name?}/{id?}", function ($name = null, $id = null) {
    $html_test = '<h2>I am html tag</h2>';
    $data = compact('name', 'id', 'html_test');
    return view('demo')->with($data);
});

// with class function 
Route::get("/", [BasicController::class, 'home']);
Route::get("/demo", [BasicController::class, 'demo']);
Route::get("/single", SingleActionController::class);

Route::get("/register", [RegistrationController::class, 'register']);
Route::post("/register", [RegistrationController::class, 'create_user']);

Route::get("/customer", [CustomerController::class, 'customer']);
Route::get("/customer/create", [CustomerController::class, 'customer_create'])->name('customer_create');
Route::post("/customer/add", [CustomerController::class, 'add_customer'])->name('customer_add');
Route::get("/customer/view", [CustomerController::class, 'get_customer'])->name('customer_get');
Route::get("/customer/delete/{id}", [CustomerController::class, 'delete_customer'])->name('customer_delete');
Route::get("/customer/edit/{id}", [CustomerController::class, 'edit_customer'])->name('customer_edit');
Route::post("/customer/update/{id}", [CustomerController::class, 'update_customer'])->name('customer_update');

Route::resource("/photo", ResourceController::class);
