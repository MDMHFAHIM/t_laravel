<?php

namespace App\Http\Controllers\Api;

use App\Models\Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class ZoneController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Zone::with('country','state',)->get();
        return $this->sendResponse($data,"Zone list");
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
                $imagePath=public_path().'/zone';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
        }
        $input['image']=implode(',',$files); */
        /* /for files */

        $data=Zone::create($input);
        return $this->sendResponse($data,"Zone created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Zone $zone)
    {
        return $this->sendResponse($zone,"Zone data");
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
                $imagePath=public_path().'/zone';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
            $input['image']=implode(',',$files);
        }
        unset($input['files']); */

        /* /for files */
        $zone=Zone::where('id',$id)->update($input);
        return $this->sendResponse($zone,"Zone updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zone $zone)
    {
        $zone=$zone->delete();
        return $this->sendResponse($zone,"Zone deleted successfully");
    }
}
