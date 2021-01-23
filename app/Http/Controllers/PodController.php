<?php

namespace App\Http\Controllers;

use App\Pod;
use Illuminate\Http\Request;

class PodController extends Controller
{
    public function index(){
        $data = Pod::select('id','name')->get();
        return response()->json(['status' => 'success', 'data' => $data]);
    }

    public function show($id){
        $data = Pod::find($id);
        return response()->json(['status' => 'success', 'data' => $data]);
    }

}
