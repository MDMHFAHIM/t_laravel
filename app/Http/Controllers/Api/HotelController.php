<?php

namespace App\Http\Controllers\Api;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class HotelController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Hotel::with('zone','catagory','roomtype')->get();
        return $this->sendResponse($data,"Hotel list");
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
                $imagePath=public_path().'/hotel';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
        }
        $input['image']=implode(',',$files);
        /* /for files */

        $data=Hotel::create($input);
        return $this->sendResponse($data,"Hotel created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        return $this->sendResponse($hotel,"Hotel data");
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
                $imagePath=public_path().'/hotel';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
            $input['image']=implode(',',$files);
        }
        unset($input['files']);

        /* /for files */
        $hotel=Hotel::where('id',$id)->update($input);
        return $this->sendResponse($hotel,"Hotel updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        $hotel=$hotel->delete();
        return $this->sendResponse($hotel,"Hotel deleted successfully");
    }
}
