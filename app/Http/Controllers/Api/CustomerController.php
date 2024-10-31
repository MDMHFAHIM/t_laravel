<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class CustomerController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Customer::get();
        return $this->sendResponse($data,"Customer list");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=Customer::create($request->all());
        return $this->sendResponse($data,"Customer created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return $this->sendResponse($customer,"Customer data");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $customer=Customer::where('id',$id)->update($request->all());
        return $this->sendResponse($customer,"Customer updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $package=$package->delete();
        return $this->sendResponse($customer,"Customer deleted successfully");
    }
}
