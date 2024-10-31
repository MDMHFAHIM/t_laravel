<?php

namespace App\Http\Controllers\Api;

use App\Models\Catagory;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class CatagoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Catagory::get();
        return $this->sendResponse($data,"Catagory list");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=Catagory::create($request->all());
        return $this->sendResponse($data,"Catagory created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Catagory $catagory)
    {
        return $this->sendResponse($catagory,"Catagory data");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $catagory=Catagory::where('id',$id)->update($request->all());
        return $this->sendResponse($catagory,"Catagory updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catagory $catagory)
    {
        $package=$package->delete();
        return $this->sendResponse($catagory,"Catagory deleted successfully");
    }
}
