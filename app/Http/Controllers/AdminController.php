<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarType;
use Illuminate\Http\Request;

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
}
