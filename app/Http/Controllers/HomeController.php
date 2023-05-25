<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Car;
use App\Models\CarType;
use App\Models\Order;
use App\Models\Reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        $role = Auth::user()->role;
        if ($role == '1')
        {
            return view('admin.dashboard');
        }
        else
        {
            return view('home.index');
        }
    }

    public function index()
    {
        return view('home.index');
    }

    public function about()
    {
        return view('home.about');
    }

    public function services()
    {
        return view('home.services');
    }

    public function pricing()
    {
        return view('home.pricing');
    }

    public function cars()
    {
        $car = Car::all();
        $carType = CarType::all();
        return view('home.cars', compact('car','carType'));
    }

    public function blog()
    {
        return view('home.blog');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function book_car(Request $request)
    {
        if (Auth::id())
        {
            $user = Auth::user();
            $user_id = $user->id;

            $book = new Bookings;

            $book->user_id = $user->id;
            $book->name = $user->name;
            $book->phone = $user->phone;
            $book->email = $user->email;

            $book->pick_up_location = $request->pickUpLocation;
            $book->drop_off_location = $request->dropOffLocation;
            $book->pick_up_date = $request->pickUpDate;
            $book->drop_off_date = $request->dropOffDate;
            $book->pick_up_time = $request->pickUpTime;
            $book->passengers = $request->passengers;

            $book->save();

            return redirect()->back()->with('message','You have successfully booked your car, You will receive an email shortly with further instructions');
        }
        else
        {
            return redirect('login');
        }
    }

    public function car_details($id)
    {
        $car = Car::find($id);
        $carType = CarType::all();
        return view('home.carDetails', compact('car','carType'));
    }

    public function reserve_car($id)
    {
        $car = Car::find($id);
        return view('home.reserveCar', compact('car'));
    }

    public function checkout()
    {
        $car = Car::all();
        $carType = CarType::all();
        $reservation = Reservations::all();
        return view('home.checkout', compact('car','carType','reservation'));
    }

    public function submit_reservation(Request $request, $id)
    {
        if (Auth::id())
        {
            $user = Auth::user();
            $user_id = $user->id;

            $reservation = new Reservations;

            $car = Car::find($id);
            $car_id = $car->id;
            $car_name = $car->name;
            $car_price = $car->price;

            $reservation->user_id = $user->id;
            $reservation->name = $request->name;
            $reservation->email = $request->email;
            $reservation->phone = $request->phone;

            $reservation->car_id = $car->id;
            $reservation->car_name = $car->name;
            $reservation->car_price = $car->daily;

            $reservation->pick_up_date = $request->pickUpDate;
            $reservation->drop_off_date = $request->dropOffDate;
            $reservation->pick_up_time = $request->pickUpTime;
            $reservation->chauffeur = $request->chauffeur;

            $reservation->save();

            return redirect('checkout');
        }
        else
        {
            return redirect('login');
        }
    }

    public function show_reservations()
    {
        if (Auth::id())
        {
            $user = Auth::user();
            $user_id = $user->id;
            $order = order::where('user_id','=',$user_id)->get();
            return view('home.showReservations', compact('order',));
        }
        else
        {
            return redirect('login');
        }
    }

    public function cash_payment()
    {

        $user = Auth::user();
        $userId = $user->id;

        $data = Reservations::where('user_id','=',$userId)->get();
        foreach ($data as $data)
        {
            $order = new Order;

            $order->user_id = $data->user_id;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->car_id = $data->car_id;
            $order->car_name = $data->car_name;
            $order->daily_price = $data->car_price;
            $order->pick_up_date = $data->pick_up_date;
            $order->drop_off_date = $data->drop_off_date;
            $order->pick_up_time = $data->pick_up_time;
            $order->chauffeur = $data->chauffeur;
            $order->payment_status = 'Cash on delivery';
            $order->delivery_status = 'Processing...';

            $order->save();

            $reservation_id = $data->id;
            $reservation = Reservations::find($reservation_id);
            $reservation->delete();
        }
        return redirect()->back()->with('message', 'We have received your order! Instructions will be sent shortly');
    }
}
