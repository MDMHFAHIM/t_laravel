<?php

namespace App\Http\Controllers\Api;

use App\Models\Flight_Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class Flight_BookingController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Flight_Booking::with('customer','flight')->get();
        return $this->sendResponse($data,"Flight_Booking list");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->all();
        /* for files */
        $files=[];
        if($request->hasFile('files')){
            foreach($request->file('files') as $f){
                $imagename=time().rand(1111,9999).".".$f->extension();
                $imagePath=public_path().'/flight_booking';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
        }
        $input['image']=implode(',',$files);
        /* /for files */

        $data=Flight_Booking::create($input);
        return $this->sendResponse($data,"Flight_Booking created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Flight_Booking $flight_booking)
    {
        return $this->sendResponse($flight_booking,"Flight_Booking data");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input=$request->all();
        /* for files */
        $files=[];
        if($request->hasFile('files')){
            foreach($request->file('files') as $f){
                $imagename=time().rand(1111,9999).".".$f->extension();
                $imagePath=public_path().'/flight_booking';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
            $input['image']=implode(',',$files);
        }
        unset($input['files']);

        /* /for files */
        $flight_booking=Flight_Booking::where('id',$id)->update($input);
        return $this->sendResponse($flight_booking,"Flight_Booking updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flight_Booking $flight_booking)
    {
        $flight_booking=$flight_booking->delete();
        return $this->sendResponse($flight_booking,"Flight_Booking deleted successfully");
    }
}
