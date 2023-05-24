<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Car;
use App\Models\CarType;
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
        return view('home.reserveCar');
    }
}
