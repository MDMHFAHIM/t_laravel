<?php

namespace App\Http\Controllers\Api;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class CountryController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Country::get();
        return $this->sendResponse($data,"Country list");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=Country::create($request->all());
        return $this->sendResponse($data,"Country created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        return $this->sendResponse($country,"Country data");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $country=Country::where('id',$id)->update($request->all());
        return $this->sendResponse($country,"Country updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $package=$package->delete();
        return $this->sendResponse($country,"Country deleted successfully");
    }
}
