<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/car_types', [AdminController::class, 'car_types']);

Route::post('/new_carType', [AdminController::class, 'new_carType']);

Route::get('/delete_carType/{id}', [AdminController::class, 'delete_carType']);

Route::get('/add_car', [AdminController::class, 'add_car']);

Route::post('/create_car', [AdminController::class, 'create_car']);

Route::get('/all_cars', [AdminController::class, 'all_cars']);

Route::get('/edit_car/{id}', [AdminController::class, 'edit_car']);

Route::post('/update_car/{id}', [AdminController::class, 'update_car']);

Route::get('/delete_car/{id}', [AdminController::class, 'delete_car']);

Route::get('/all_bookings', [AdminController::class, 'all_bookings']);

Route::get('/reservation_orders', [AdminController::class, 'reservation_orders']);

Route::get('/order_confirmation/{id}', [AdminController::class, 'order_confirmation']);





Route::get('/about', [HomeController::class, 'about']);

Route::get('/services', [HomeController::class, 'services']);

Route::get('/cars', [HomeController::class, 'cars']);

Route::get('/blog', [HomeController::class, 'blog']);

Route::get('/contact', [HomeController::class, 'contact']);

Route::post('/book_car', [HomeController::class, 'book_car']);

Route::get('/car_details/{id}', [HomeController::class, 'car_details']);

Route::get('/reserve_car/{id}', [HomeController::class, 'reserve_car']);

Route::post('/submit_reservation/{id}', [HomeController::class, 'submit_reservation']);

Route::get('/checkout', [HomeController::class, 'checkout']);

Route::get('/cash_payment', [HomeController::class, 'cash_payment']);

Route::get('/show_reservations', [HomeController::class, 'show_reservations']);

Route::get('/cancel_reservation_order/{id}', [HomeController::class, 'cancel_reservation_order']);

Route::get('/show_bookings', [HomeController::class, 'show_bookings']);

Route::get('/cancel_booking/{id}', [HomeController::class, 'cancel_booking']);

Route::get('/stripe/{totalPrice}', [HomeController::class, 'stripe']);

Route::post('stripe/{totalPrice}', [HomeController::class, 'stripePost'])->name('stripe.post');
