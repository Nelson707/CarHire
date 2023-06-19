<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Bookings;
use App\Models\Car;
use App\Models\CarType;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Reservations;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;
use function Symfony\Component\String\s;

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
            $car = Car::all();
            $carType = CarType::all();
            $post = post::paginate(3);
            $about = about::all();
            $service = service::all();
            return view('home.index', compact('car','carType','post','about','service'));
        }
    }

    public function index()
    {
        $car = Car::all();
        $carType = CarType::all();
        $post = post::paginate(3);
        $about = about::all();
        $service = service::all();
        return view('home.index', compact('car','carType','post','about','service'));
    }

    public function about()
    {
        $about = about::all();
        return view('home.about', compact('about'));
    }

    public function services()
    {
        $service = service::all();
        return view('home.services', compact('service'));
    }

    public function cars()
    {
        $car = Car::all();
        $carType = CarType::all();
        return view('home.cars', compact('car','carType'));
    }

    public function blog()
    {
        $post = post::paginate(3);
        return view('home.blog', compact('post'));
    }

    public function blog_details($id)
    {
        $post = post::find($id);
        $posts = post::paginate(5);
        $comment = comment::orderBy('id','desc')->get();
        $reply = reply::orderBy('id','desc')->get();
        return view('home.blogDetails', compact('post','posts','comment','reply'));
    }

    public function add_comment(Request $request, $id)
    {
        if (Auth::id())
        {
            $comment = new comment;

            $comment->name = Auth::user()->name;

            $comment->user_id = Auth::user()->id;

            $comment->post_id = $id;

            $comment->comment = $request->comment;

            $comment->save();

            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }

    public function reply_comment(Request $request)
    {
        if (Auth::user())
        {
            $reply = new reply;

            $reply->user_id = Auth::user()->id;

            $reply->name = Auth::user()->name;

            $reply->comment_id = $request->commentId;

            $reply->reply = $request->reply;

            $reply->save();

            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

            'email' => 'required|email',

            'phone' => 'required|digits:10|numeric',

            'subject' => 'required',

            'message' => 'required'
        ]);

        Contact::create($request->all());
        return redirect()->back()->with('message','Thank you for contacting us. We will contact you shortly.');
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

            return redirect('showBookings')->with('message','You have successfully booked your car, You will receive an email shortly with further instructions');
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

    public function cancel_reservation_order($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect()->back()->with('message','Your Reservation Has been Successfully cancelled');
    }

    public function show_bookings()
    {
        if (Auth::id())
        {
            $user = Auth::user();
            $user_id = $user->id;
            $booking = Bookings::where('user_id','=',$user_id)->get();
            return view('home.showBookings', compact('booking',));
        }
        else
        {
            return redirect('login');
        }
    }

    public function cancel_booking($id)
    {
        $booking = Bookings::find($id);
        $booking->delete();

        return redirect()->back()->with('message','Your Booking Has been Successfully cancelled');
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

    public function stripe($totalPrice)
    {
        return view('home.stripe',compact('totalPrice'));
    }

    public function stripePost(Request $request, $totalPrice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([

            "amount" => $totalPrice / 1,

            "currency" => "usd",

            "source" => $request->stripeToken,

            "description" => "Test payment from itsolutionstuff.com."

        ]);

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
            $order->payment_status = 'Paid with card';
            $order->delivery_status = 'Processing...';

            $order->save();

            $reservation_id = $data->id;
            $reservation = Reservations::find($reservation_id);
            $reservation->delete();
        }

        Session::flash('success', 'Payment successful!');

        return back();
    }
}
