<?php

namespace App\Http\Controllers\Api;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class FlightController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Flight::with('airline')->get();
        return $this->sendResponse($data,"Flight list");
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
                $imagePath=public_path().'/flight';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
        }
        $input['image']=implode(',',$files);
        /* /for files */

        $data=Flight::create($input);
        return $this->sendResponse($data,"Flight created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Flight $flight)
    {
        return $this->sendResponse($flight,"Flight data");
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
                $imagePath=public_path().'/flight';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
            $input['image']=implode(',',$files);
        }
        unset($input['files']);

        /* /for files */
        $flight=Flight::where('id',$id)->update($input);
        return $this->sendResponse($flight,"Flight updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flight $flight)
    {
        $flight=$flight->delete();
        return $this->sendResponse($flight,"Flight deleted successfully");
    }
}
