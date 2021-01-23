<?php

namespace App\Http\Controllers;

use App\BookingStatus;
use Illuminate\Http\Request;

class BookingStatusController extends Controller
{
    public function index(){
        $data = BookingStatus::select('id','status')->get();
        return response()->json(['status' => 'success', 'data' => $data]);
    }
}
