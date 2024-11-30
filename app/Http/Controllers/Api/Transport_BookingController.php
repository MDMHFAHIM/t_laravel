<?php

namespace App\Http\Controllers\Api;

use App\Models\TransportBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class Transport_BookingController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=TransportBooking::with('customer','transport')->get();
        return $this->sendResponse($data,"Transport_Booking list");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $pack['customer_id']=$request->customer_id;
        $pack['transport_id']=$request->package_id;
        $pack['person']=$request->person;
        $pack['check_in_date']=$request->check_in_date;
        $pack['check_out_date']=$request->check_out_date;

        $data=TransportBooking::create($pack);
        return $this->sendResponse($data,"Transport_Booking created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(TransportBooking $transport_booking)
    {
        return $this->sendResponse($transport_booking,"Transport_Booking data");
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
                $imagePath=public_path().'/transport_booking';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
            $input['image']=implode(',',$files);
        }
        unset($input['files']); */

        /* /for files */
        $transport_booking=TransportBooking::where('id',$id)->update($input);
        return $this->sendResponse($transport_booking,"Transport_Booking updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransportBooking $transport_booking)
    {
        $transport_booking=$transport_booking->delete();
        return $this->sendResponse($transport_booking,"Transport_Booking deleted successfully");
    }
}
