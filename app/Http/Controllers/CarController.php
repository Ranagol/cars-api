<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //`/cars?take=10&skip=5`
        $skip = request()->input('skip', 0);//take the skip value from the url request
        $take = request()->input('take', Car::count());//take the take value from the url request
        return Car::skip($skip)->take($take)->get();   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand' => 'required|min:2',
            'model' => 'required|min:2',
            'year' => 'required',
            'maxSpeed' => 'integer|min:20|max:300',
            'isAutomatic' => 'required',
            'engine' => 'required',
            'numberOfDoors' => 'required|integer|min:2|max:5',
        ]);

        $car = new Car;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->maxSpeed = $request->maxSpeed;
        $car->isAutomatic = $request->isAutomatic;
        $car->engine = $request->engine;
        $car->numberOfDoors = $request->numberOfDoors;
        $car->save();
        return $car;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return $car;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)//this is experimenting, this may not work
    {
        $validatedData = $request->validate([
            'brand' => 'required|min:2',
            'model' => 'required|min:2',
            'year' => 'required',
            'maxSpeed' => 'integer|min:20|max:300',
            'isAutomatic' => 'required',
            'engine' => 'required',
            'numberOfDoors' => 'required|integer|min:2|max:5',
        ]);
        
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->maxSpeed = $request->maxSpeed;
        $car->isAutomatic = $request->isAutomatic;
        $car->engine = $request->engine;
        $car->numberOfDoors = $request->numberOfDoors;
        $car->save();
        return $car;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return new JsonResponse(true);
    }
}
