<?php

namespace App\Http\Controllers\Api;

use App\Models\Transport;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class TransportController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Transport::with('vehicle')->get();
        return $this->sendResponse($data,"Transport list");
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
                $imagePath=public_path().'/transport';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
        }
        $input['image']=implode(',',$files);
        /* /for files */

        $data=Transport::create($input);
        return $this->sendResponse($data,"Transport created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Transport $transport)
    {
        return $this->sendResponse($transport,"Transport data");
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
                $imagePath=public_path().'/transport';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
            $input['image']=implode(',',$files);
        }
        unset($input['files']);

        /* /for files */
        $transport=Transport::where('id',$id)->update($input);
        return $this->sendResponse($transport,"Transport updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transport $transport)
    {
        $transport=$transport->delete();
        return $this->sendResponse($transport,"Transport deleted successfully");
    }
}
