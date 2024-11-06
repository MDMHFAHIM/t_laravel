<?php

namespace App\Http\Controllers\Api;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class PackageController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
         $data=Package::get();
        return $this->sendResponse($data,"Package list");
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
                $imagePath=public_path().'/package';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
        }
        $input['image']=implode(',',$files);
        /* /for files */

        $data=Package::create($input);
        return $this->sendResponse($data,"Package created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        return $this->sendResponse($package,"Package data");
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
                $imagePath=public_path().'/package';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
            $input['image']=implode(',',$files);
        }
        unset($input['files']);

        /* /for files */
        $package=Package::where('id',$id)->update($input);
        return $this->sendResponse($package,"Package updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $package=$package->delete();
        return $this->sendResponse($package,"Package deleted successfully");
    }
}
