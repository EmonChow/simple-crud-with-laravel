<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;


class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cars = Car::all();
       return view('cars',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::all();
      return view('create_car',compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required',
            'year' => 'required',
        ]);

        Car::create($request->all());

        return redirect()->route('cars.list')->with('success','Car created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_cars= Car::find($id);
        return view('cars_edit',compact('edit_cars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit_cars= Car::find($id);
        $request->validate([
            'model' => 'required',
            'year' => 'required',
        ]);
      
        $update_car = new Car();
        $update_car->model=$request->model;
        $update_car->year=$request->year;
        $update_car->save();
         $notification = array(
           'message' => 'successfully',
           'alert-type' =>'info'
        );
   
        return redirect()->route('cars.list')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $delete_cars = Car::find($id);
        $delete_cars->delete();
        $notification = array(
           'message' => 'deleted successfully',
           'alert-type' => 'info'
        );
    
        return redirect()->route('cars.list')->with($notification);
    }
}
