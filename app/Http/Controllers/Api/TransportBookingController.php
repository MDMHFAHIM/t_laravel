<?php

namespace App\Http\Controllers\Api;

use App\Models\Transport_Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class TransportBookingController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Transport_Booking::with('customer','transport')->get();
        return $this->sendResponse($data,"Transport_Booking list");
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
                $imagePath=public_path().'/transport_booking';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
        }
        $input['image']=implode(',',$files); */
        /* /for files */

        $data=Transport_Booking::create($input);
        return $this->sendResponse($data,"Transport_Booking created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Transport_Booking $transport_booking)
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
        $transport_booking=Transport_Booking::where('id',$id)->update($input);
        return $this->sendResponse($transport_booking,"Transport_Booking updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transport_Booking $transport_booking)
    {
        $transport_booking=$transport_booking->delete();
        return $this->sendResponse($transport_booking,"Transport_Booking deleted successfully");
    }
}
