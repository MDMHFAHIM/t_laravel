<?php

namespace App\Http\Controllers\Api;

use App\Models\HotelBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class Hotel_BookingController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=HotelBooking::with('customer','hotel','roomtype')->get();
        return $this->sendResponse($data,"HotelBooking list");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->all();
        /* for files
        $files=[];
        if($request->hasFile('files')){
            foreach($request->file('files') as $f){
                $imagename=time().rand(1111,9999).".".$f->extension();
                $imagePath=public_path().'/hotel_booking';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
        }
        $input['image']=implode(',',$files); */
        /* /for files */

        $data=HotelBooking::create($input);
        return $this->sendResponse($data,"HotelBooking created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        return $id;
        return $hotel_booking;
        return $this->sendResponse($hotel_booking,"HotelBooking data");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input=$request->all();
        /* for files
        $files=[];
        if($request->hasFile('files')){
            foreach($request->file('files') as $f){
                $imagename=time().rand(1111,9999).".".$f->extension();
                $imagePath=public_path().'/hotel_booking';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
            $input['image']=implode(',',$files);
        }
        unset($input['files']); */

        /* /for files */
        $hotel_booking=HotelBooking::where('id',$id)->update($input);
        return $this->sendResponse($hotel_booking,"HotelBooking updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelBooking $hotel_booking)
    {
        $hotel_booking=$hotel_booking->delete();
        return $this->sendResponse($hotel_booking,"HotelBooking deleted successfully");
    }
}
