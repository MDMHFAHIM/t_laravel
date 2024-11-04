<?php

namespace App\Http\Controllers\Api;

use App\Models\Hotel_Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class Hotel_BookingController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Hotel_Booking::with('customer','hotel','roomtype')->get();
        return $this->sendResponse($data,"Hotel_Booking list");
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

        $data=Hotel_Booking::create($input);
        return $this->sendResponse($data,"Hotel_Booking created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel_Booking $hotel_booking)
    {
        return $this->sendResponse($hotel_booking,"Hotel_Booking data");
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
        $hotel_booking=Hotel_Booking::where('id',$id)->update($input);
        return $this->sendResponse($hotel_booking,"Hotel_Booking updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel_Booking $hotel_booking)
    {
        $hotel_booking=$hotel_booking->delete();
        return $this->sendResponse($hotel_booking,"Hotel_Booking deleted successfully");
    }
}
