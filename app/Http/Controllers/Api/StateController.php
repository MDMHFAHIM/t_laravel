<?php

namespace App\Http\Controllers\Api;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class StateController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=State::get();
        return $this->sendResponse($data,"State list");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=State::create($request->all());
        return $this->sendResponse($data,"State created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        return $this->sendResponse($state,"State data");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $state=State::where('id',$id)->update($request->all());
        return $this->sendResponse($state,"State updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        $package=$package->delete();
        return $this->sendResponse($state,"State deleted successfully");
    }
}
