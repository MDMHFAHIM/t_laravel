<?php

namespace App\Http\Controllers\Api;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class StateController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=State::with('country',)->get();
        return $this->sendResponse($data,"State list");
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
                $imagePath=public_path().'/state';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
        }
        $input['image']=implode(',',$files); */
        /* /for files */

        $data=State::create($input);
        return $this->sendResponse($data,"State created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        return $this->sendResponse($state,"State data");
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
                $imagePath=public_path().'/state';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
            $input['image']=implode(',',$files);
        }
        unset($input['files']); */

        /* /for files */
        $state=State::where('id',$id)->update($input);
        return $this->sendResponse($state,"State updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        $state=$state->delete();
        return $this->sendResponse($state,"State deleted successfully");
    }
}
