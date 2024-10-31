<?php

namespace App\Http\Controllers\Api;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class VehicleController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Vehicle::get();
        return $this->sendResponse($data,"Vehicle list");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=Vehicle::create($request->all());
        return $this->sendResponse($data,"Vehicle created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        return $this->sendResponse($vehicle,"Vehicle data");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $vehicle=Vehicle::where('id',$id)->update($request->all());
        return $this->sendResponse($vehicle,"Vehicle updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $package=$package->delete();
        return $this->sendResponse($vehicle,"Vehicle deleted successfully");
    }
}
