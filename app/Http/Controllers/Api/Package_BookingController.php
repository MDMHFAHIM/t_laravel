<?php

namespace App\Http\Controllers\Api;

use App\Models\Package_Booking;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class Package_BookingController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Package_Booking::with('customer','package')->get();
        return $this->sendResponse($data,"Package_Booking list");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $package=Package::find($request->package_id);

        $pack['customer_id']=$request->customer_id;
        $pack['package_id']=$request->package_id;
        $pack['person']=$request->person;
        $pack['number_of_guest_adult']=$request->number_of_guest_adult;
        $pack['number_of_guest_child']=$request->number_of_guest_child;
        $pack['check_in_date']=$request->check_in_date;
        $pack['duration']=$package->duration;
        $pack['fare']=$request->total;

        $data=Package_Booking::create($pack);
        return $this->sendResponse($data,"Package_Booking created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Package_Booking $package_booking)
    {
        return $this->sendResponse($package_booking,"Package_Booking data");
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
                $imagePath=public_path().'/package_booking';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
            $input['image']=implode(',',$files);
        }
        unset($input['files']); */

        /* /for files */
        $package_booking=Package_Booking::where('id',$id)->update($input);
        return $this->sendResponse($package_booking,"Package_Booking updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package_Booking $package_booking)
    {
        $package_booking=$package_booking->delete();
        return $this->sendResponse($package_booking,"Package_Booking deleted successfully");
    }
}
