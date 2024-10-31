<?php

namespace App\Http\Controllers\Api;

use App\Models\Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class ZoneController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Zone::get();
        return $this->sendResponse($data,"Zone list");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=Zone::create($request->all());
        return $this->sendResponse($data,"Zone created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Zone $zone)
    {
        return $this->sendResponse($zone,"Zone data");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $zone=Zone::where('id',$id)->update($request->all());
        return $this->sendResponse($zone,"Zone updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zone $zone)
    {
        $package=$package->delete();
        return $this->sendResponse($zone,"Zone deleted successfully");
    }
}
