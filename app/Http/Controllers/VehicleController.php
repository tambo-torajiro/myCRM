<?php

namespace App\Http\Controllers;

use App\Models\vehicle;
use App\Http\Requests\StorevehicleRequest;
use App\Http\Requests\UpdatevehicleRequest;
use Inertia\Inertia;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::select('id','type','car_number','inspection_date')->get();
        // dd($vehicles);

        return Inertia::render('Vehicles/Index',[
            'vehicles' => $vehicles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Vehicles/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorevehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorevehicleRequest $request)
    {

        $registration_date = string($request->registration_date);
        $inspection_date = string($request->inspection_date);

            Vehicle::create([
            'type' => $request->type,
            'car_number' => $request->car_number,
            'body_type' => $request->body_type,
            'registration_date' => $registration_date,
            'inspection_date' => $inspection_date,
            'start_milage' => $request->start_milage,
        ]);

            return to_route('vehicles.index')
            ->with([
                'message' => '登録しました。',
                'status' => 'success'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(vehicle $vehicle)
    {
        // dd($vehicle);
        return Inertia::render('Vehicles/Show',[
            'vehicle' => $vehicle
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(vehicle $vehicle)
    {
        return Inertia::render('Vehicles/Edit',[
            'vehicle' => $vehicle
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatevehicleRequest  $request
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatevehicleRequest $request, vehicle $vehicle)
    {
        // dd($vehicle->registration_date, $request->registration_date);

        $vehicle->type = $request->type;
        $vehicle->car_number = $request->car_number;
        $vehicle->body_type = $request->body_type;
        $vehicle->registration_date = $request->registration_date;
        $vehicle->inspection_date = $request->inspection_date;
        $vehicle->start_milage = $request->start_milage;
        $vehicle->save();

        return to_route('vehicles.index')
        ->with([
            'message' => '更新しました',
            'status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(vehicle $vehicle)
    {
        $vehicle->delete();

        return to_route('vehicles.index')->with([
            'message' => '削除しました。',
            'status' => 'danger'
        ]);
    }
}
