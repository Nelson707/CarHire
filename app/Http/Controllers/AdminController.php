<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Car;
use App\Models\CarType;
use App\Models\Order;
use App\Models\Post;
use App\Models\Reservations;
use App\Notifications\SendEmailNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function car_types()
    {
        $carType = CarType::all();
        return view('admin.carTypes', compact('carType'));
    }

    public function new_carType(Request $request)
    {
        $carType = new CarType;
        $carType->name = $request->car_type;
        $carType->save();
        return redirect()->back()->with('message','Car Type added successfully');
    }

    public function delete_carType($id)
    {
        $carType = CarType::find($id);
        $carType->delete();
        return redirect()->back()->with('message','Car Type deleted successfully');
    }

    public function add_car()
    {
        $carType = CarType::all();
        return view('admin.addCars', compact('carType'));
    }

    public function create_car(Request $request)
    {
        $car = new Car;

        $car->name = $request->car_name;
        $car->details = $request->car_details;
        $car->passengers = $request->passenger_count;
        $car->hourly = $request->hour_rate;
        $car->daily = $request->daily_rate;
        $car->leasing = $request->lease_rate;
        $car->type = $request->car_type;

        $image = $request->image;

        $imageName = time().'.'. $image->getClientOriginalExtension();
        $request->image->move('car_images', $imageName);
        $car->image = $imageName;

        $car->save();

        return redirect()->back()->with('message','Car added successfully');

    }

    public function all_cars()
    {
        $car = car::all();
        return view('admin.allCars', compact('car'));
    }

    public function edit_car($id)
    {
        $car = car::find($id);
        $carType = CarType::all();

        return view('admin.editCar', compact('car','carType'));
    }

    public function update_car(Request $request, $id)
    {
        $car = car::find($id);

        $car->name = $request->car_name;
        $car->details = $request->car_details;
        $car->passengers = $request->passenger_count;
        $car->hourly = $request->hour_rate;
        $car->daily = $request->daily_rate;
        $car->leasing = $request->lease_rate;
        $car->type = $request->car_type;

        $image = $request->image;

        if ($image)
        {
            $imageName = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('car_images', $imageName);

            $car->image = $imageName;
        }


        $car->save();

        return redirect()->back()->with('message','Car updated successfully');
    }

    public function delete_car($id)
    {
        $car = car::find($id);
        $car->delete();
        return redirect()->back()->with('message','Car deleted successfully');
    }

    public function all_bookings()
    {
        $book = Bookings::all();
        return view('admin.bookings', compact('book'));
    }

    public function reservation_orders()
    {
        $order = Order::all();
        return view('admin.reservations', compact('order'));
    }

    public function order_confirmation($id)
    {
        $order = order::find($id);

        $order->delivery_status = "Confirmed";

        $order->payment_status = "Payment Confirmed";

        $order->save();

        return redirect()->back();
    }

    public function print_pdf($id)
    {
        $order = order::find($id);
        $pdf = PDF::loadView('admin.pdf', compact('order'));
        return $pdf->download('order_details.pdf');
    }

    public function print_booking_pdf($id)
    {
        $book = bookings::find($id);
        $pdf = PDF::loadView('admin.book_pdf', compact('book'));
        return $pdf->download('order_details.pdf');
    }

    public function send_email($id)
    {
        $order = order::find($id);
        return view('admin.reservation_email', compact('order'));
    }

    public function send_reservation_email(Request $request, $id)
    {
        $order = order::find($id);
        $details = [
            'greeting' => $request->greeting,
            'firstLine' => $request->firstLine,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastLine' => $request->lastLine,
        ];

        Notification::send($order, new SendEmailNotification($details));

        return redirect()->back()->with('message','Email sent successfully');
    }

    public function send_book_email($id)
    {
        $book = bookings::find($id);
        return view('admin.booking_email', compact('book'));
    }

    public function send_booking_email(Request $request, $id)
    {
        $book = bookings::find($id);
        $details = [
            'greeting' => $request->greeting,
            'firstLine' => $request->firstLine,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastLine' => $request->lastLine,
        ];

        Notification::send($book, new SendEmailNotification($details));

        return redirect()->back()->with('message','Email sent successfully');
    }

    public function add_post()
    {
        return view('admin.addPost');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {

            $originName = $request->file('upload')->getClientOriginalName();

            $fileName = pathinfo($originName, PATHINFO_FILENAME);

            $extension = $request->file('upload')->getClientOriginalExtension();

            $fileName = $fileName . '_' . time() . '.' . $extension;



            $request->file('upload')->move(public_path('post_images'), $fileName);



            $url = asset('post_images/' . $fileName);



            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);

        }
    }

    public function create_post(Request $request)
    {
        $post = new post;

        $post->title = $request->title;
        $post->details = $request->details;
        $post->author = $request->author;
        $post->tag = $request->tag;

        $image = $request->image;

        $imageName = time().'.'. $image->getClientOriginalExtension();
        $request->image->move('post_images', $imageName);
        $post->image = $imageName;

        $post->save();

        return redirect()->back()->with('message','Post create successfully');

    }
}
