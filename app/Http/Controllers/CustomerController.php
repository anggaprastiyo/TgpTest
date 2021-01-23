<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function show($id){
        $data = Customer::find($id);
        return response()->json(['status' => 'success', 'data' => $data]);      
    }
    
}
