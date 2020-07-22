<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Data;

class dataController extends Controller
{
    public function try(Request $request){
    	// return Data::all();
    	$data = new Data;
    	$data->name = $request->name;
    	$data->address = $request->address;
    	if($data->save()){
    		return "data have been saved";
    	}

    }

    public function update(Request $request){
    	$data = Data::find($request->id);
    	$data->address = $request->address;
    	if($data->update()){
    		return "updated";
    	}
    }
}
