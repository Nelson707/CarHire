<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Bookings;
use App\Models\Car;
use App\Models\CarType;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Post;
use App\Models\Reservations;
use App\Models\Service;
use App\Notifications\SendEmailNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::id())
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
        else
        {
            redirect('login');
        }

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



            $request->file('upload')->move(public_path('media'), $fileName);



            $url = asset('media/' . $fileName);



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
        $request->image->move('media', $imageName);
        $post->image = $imageName;

        $post->save();

        return redirect()->back()->with('message','Post created successfully');

    }

    public function all_posts()
    {
        $post = post::all();
        return view('admin.allPosts', compact('post'));
    }

    public function update_post($id)
    {
        $post = post::find($id);
        return view('admin.updatePost', compact('post'));
    }

    public function edit_post(Request $request, $id)
    {
        $post = post::find($id);

        $post->title = $request->title;

        $post->details = $request->details;

        $post->author = $request->author;

        $post->tag = $request->tag;

        $image = $request->image;

        if ($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('media', $imagename);

            $post->image = $imagename;
        }

        $post->save();

        return redirect()->back()->with('message','Post updated successfully');
    }

    public function delete_post($id)
    {
        $post = post::find($id);
        $post->delete();
        return redirect()->back()->with('message','Post deleted successfully');
    }

    public function publish_post($id)
    {
        $post = post::find($id);
        $post->tag = 'Published';
        $post->save();
        return redirect()->back();
    }

    public function unpublish_post($id)
    {
        $post = post::find($id);
        $post->tag = 'unpublished';
        $post->save();
        return redirect()->back();
    }

    public function about_us()
    {
        return view('admin.aboutUs');
    }

    public function create_about_us(Request $request)
    {
        $about = new About;

        $about->description = $request->description;

        $about->save();
        return redirect()->back()->with('message','About Us uploaded successfully');

    }

    public function view_about_us()
    {
        $about = about::all();
        return view('admin.about_us', compact('about'));
    }

    public function edit_about($id)
    {
        $about = about::find($id);
        return view('admin.edit_about_us', compact('about'));
    }

    public function update_about(Request $request, $id)
    {
        $about = about::find($id);

        $about->description = $request->description;

        $about->save();
        return redirect()->back()->with('message','About Us Updated successfully');
    }

    public function delete_about($id)
    {
        $about = about::find($id);
        $about->delete();
        return redirect()->back()->with('message','About Us Deleted successfully');
    }

    public function add_service()
    {
        return view('admin.addService');
    }

    public function create_service(Request $request)
    {
        $service = new Service;

        $service->name = $request->name;
        $service->details = $request->details;

        $service->save();
        return redirect()->back()->with('message','Service Added Successfully');
    }

    public function view_services()
    {
        $service = service::all();
        return view('admin.allServices', compact('service'));
    }

    public function edit_service($id)
    {
        $service = service::find($id);
        return view('admin.editService', compact('service'));
    }

    public function update_service(Request $request, $id)
    {
        $service = service::find($id);

        $service->name = $request->name;
        $service->details = $request->details;

        $service->save();
        return redirect()->back()->with('message','Service Updated Successfully');
    }

    public function delete_service($id)
    {
        $service = service::find($id);

        $service->delete();
        return redirect()->back()->with('message','Service Deleted Successfully');
    }

    public function search_cars(Request $request)
    {
        $searchText = $request->search;
        $car = car::where('name','LIKE',"%$searchText%")->orWhere('details','LIKE',"%$searchText%")->orWhere('type','LIKE',"%$searchText%")->orWhere('passengers','LIKE',"%$searchText%")->get();

        return view('admin.allCars', compact('car'));
    }

    public function search_bookings(Request $request)
    {
        $searchText = $request->search;
        $book = bookings::where('name','LIKE',"%$searchText%")->orWhere('email','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->orWhere('pick_up_location','LIKE',"%$searchText%")->orWhere('drop_off_location','LIKE',"%$searchText%")->get();

        return view('admin.bookings', compact('book'));
    }

    public function search_orders(Request $request)
    {
        $searchText = $request->search;
        $order = order::where('name','LIKE',"%$searchText%")->orWhere('email','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->orWhere('car_name','LIKE',"%$searchText%")->get();

        return view('admin.reservations', compact('order'));
    }

    public function search_posts(Request $request)
    {
        $searchText = $request->search;
        $post = post::where('title','LIKE',"%$searchText%")->orWhere('details','LIKE',"%$searchText%")->orWhere('author','LIKE',"%$searchText%")->orWhere('tag','LIKE',"%$searchText%")->get();

        return view('admin.allPosts', compact('post'));
    }

    public function search_services(Request $request)
    {
        $searchText = $request->search;
        $service = service::where('name','LIKE',"%$searchText%")->orWhere('details','LIKE',"%$searchText%")->get();

        return view('admin.allServices', compact('service'));
    }

    public function received_messages()
    {
        $contact = contact::all();
        return view('admin.inbox', compact('contact'));
    }

    public function search_messages(Request $request)
    {
        $searchText = $request->search;
        $contact = contact::where('name','LIKE',"%$searchText%")->orWhere('email','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->orWhere('message','LIKE',"%$searchText%")->get();

        return view('admin.inbox', compact('contact'));
    }

    public function delete_message($id)
    {
        $contact = contact::find($id);
        $contact->delete();
        return redirect()->back()->with('message','Message Deleted Successfully');
    }
}
