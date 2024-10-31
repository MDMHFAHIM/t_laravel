<?php

namespace App\Http\Controllers\Api;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class PackageController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Package::get();
        return $this->sendResponse($data,"Package list");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=Package::create($request->all());
        return $this->sendResponse($data,"Package created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        return $this->sendResponse($package,"Package data");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $package=Package::where('id',$id)->update($request->all());
        return $this->sendResponse($package,"Package updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $package=$package->delete();
        return $this->sendResponse($package,"Package deleted successfully");
    }
}
