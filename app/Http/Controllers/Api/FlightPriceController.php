<?php

namespace App\Http\Controllers\Api;

use App\Models\Flightprice;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class FlightPriceController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data=Flightprice::with('flight');
        if($request->hotel_id){
            $data=$data->where('flight_id',$request->hotel_id);
        }
        $data=$data->get();
        return $this->sendResponse($data,"Flightprice list");
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
                $imagePath=public_path().'/flightprice';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
        }
        $input['image']=implode(',',$files); */
        /* /for files */

        $data=Flightprice::create($input);
        return $this->sendResponse($data,"Flightprice created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Flightprice $flightprice)
    {
        return $this->sendResponse($flightprice,"Flightprice data");
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
                $imagePath=public_path().'/flightprice';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
            $input['image']=implode(',',$files);
        }
        unset($input['files']); */

        /* /for files */
        $flightprice=Flightprice::where('id',$id)->update($input);
        return $this->sendResponse($flightprice,"Flightprice updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flightprice $flightprice)
    {
        $flightprice=$flightprice->delete();
        return $this->sendResponse($flightprice,"Flightprice deleted successfully");
    }
}
