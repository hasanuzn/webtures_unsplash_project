<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photographers as _Photographers;

class Photographers extends Controller
{
    public function index(){
        $data['photographers'] = _Photographers::all();
        return view('photographers',$data)->render();
    }
    public function show($id){
        $data['photographer'] = _Photographers::find($id);
        return view('photographer',$data)->render();
    }
    public function getPhotographer(Request $request){
        $data['photographer'] = _Photographers::find($request->id);
        return view('photographer_modal',$data)->render();
    }
}
