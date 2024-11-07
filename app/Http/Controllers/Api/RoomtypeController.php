<?php

namespace App\Http\Controllers\Api;

use App\Models\Roomtype;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class RoomtypeController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data=Roomtype::with('hotel');
        if($request->hotel_id){
            $data=$data->where('hotel_id',$request->hotel_id);
        }
        $data=$data->get();
        return $this->sendResponse($data,"Roomtype list");
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
                $imagePath=public_path().'/roomtype';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
        }
        $input['image']=implode(',',$files); */
        /* /for files */

        $data=Roomtype::create($input);
        return $this->sendResponse($data,"Roomtype created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Roomtype $roomtype)
    {
        return $this->sendResponse($roomtype,"Roomtype data");
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
                $imagePath=public_path().'/roomtype';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
            $input['image']=implode(',',$files);
        }
        unset($input['files']); */

        /* /for files */
        $roomtype=Roomtype::where('id',$id)->update($input);
        return $this->sendResponse($roomtype,"Roomtype updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roomtype $roomtype)
    {
        $roomtype=$roomtype->delete();
        return $this->sendResponse($roomtype,"Roomtype deleted successfully");
    }
}
