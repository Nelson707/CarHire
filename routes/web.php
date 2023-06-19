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

Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth','verified');

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

Route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf']);

Route::get('/print_booking_pdf/{id}', [AdminController::class, 'print_booking_pdf']);

Route::get('/send_email/{id}', [AdminController::class, 'send_email']);

Route::post('/send_reservation_email/{id}', [AdminController::class, 'send_reservation_email']);

Route::get('/send_book_email/{id}', [AdminController::class, 'send_book_email']);

Route::post('/send_booking_email/{id}', [AdminController::class, 'send_booking_email']);

Route::get('/add_post', [AdminController::class, 'add_post']);

Route::post('ckeditor/upload', [AdminController::class, 'upload'])->name('ckeditor.upload');

Route::post('/create_post', [AdminController::class, 'create_post']);

Route::get('/all_posts', [AdminController::class, 'all_posts']);

Route::get('/update_post/{id}', [AdminController::class, 'update_post']);

Route::post('/edit_post/{id}', [AdminController::class, 'edit_post']);

Route::get('/delete_post/{id}', [AdminController::class, 'delete_post']);

Route::get('/publish_post/{id}', [AdminController::class, 'publish_post']);

Route::get('/unpublish_post/{id}', [AdminController::class, 'unpublish_post']);

Route::get('/about_us', [AdminController::class, 'about_us']);

Route::post('/create_about_us', [AdminController::class, 'create_about_us']);

Route::get('/view_about_us', [AdminController::class, 'view_about_us']);

Route::get('/edit_about/{id}', [AdminController::class, 'edit_about']);

Route::post('/update_about/{id}', [AdminController::class, 'update_about']);

Route::get('/delete_about/{id}', [AdminController::class, 'delete_about']);

Route::get('/add_service', [AdminController::class, 'add_service']);

Route::post('/create_service', [AdminController::class, 'create_service']);

Route::get('/view_services', [AdminController::class, 'view_services']);

Route::get('/edit_service/{id}', [AdminController::class, 'edit_service']);

Route::post('/update_service/{id}', [AdminController::class, 'update_service']);

Route::get('/delete_service/{id}', [AdminController::class, 'delete_service']);

Route::get('/search_cars', [AdminController::class, 'search_cars']);

Route::get('/search_bookings', [AdminController::class, 'search_bookings']);

Route::get('/search_orders', [AdminController::class, 'search_orders']);

Route::get('/search_posts', [AdminController::class, 'search_posts']);

Route::get('/search_services', [AdminController::class, 'search_services']);





Route::get('/about', [HomeController::class, 'about']);

Route::get('/services', [HomeController::class, 'services']);

Route::get('/cars', [HomeController::class, 'cars']);

Route::get('/blog', [HomeController::class, 'blog']);

Route::get('/blog_details/{id}', [HomeController::class, 'blog_details']);

Route::post('/add_comment/{id}', [HomeController::class, 'add_comment']);

Route::post('/reply_comment', [HomeController::class, 'reply_comment']);

Route::get('/contact', [HomeController::class, 'contact']);

Route::post('contact_us', [HomeController::class, 'store'])->name('contact.us.store');

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

Route::get('/search_car', [HomeController::class, 'search_car']);
