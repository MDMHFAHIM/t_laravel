<?php

namespace App\Http\Controllers\Api;

use App\Models\Airline;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class AirlineController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Airline::get();
        return $this->sendResponse($data,"Airline list");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=Airline::create($request->all());
        return $this->sendResponse($data,"Airline created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Airline $airline)
    {
        return $this->sendResponse($airline,"Airline data");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $airline=Airline::where('id',$id)->update($request->all());
        return $this->sendResponse($airline,"Airline updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airline $airline)
    {
        $package=$package->delete();
        return $this->sendResponse($airline,"Airline deleted successfully");
    }
}
