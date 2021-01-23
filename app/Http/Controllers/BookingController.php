<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index()
    {
        $data = Booking::select(
                    'bookings.id as id',
                    'bookings.pod_id',
                    'pods.name as pod_name',
                    'pods.address as pod_address',
                    'pods.price_hour',
                    'customers.id as customer_id',
                    'customers.user_name',
                    'customers.name as customer_name',
                    'customers.gender',
                    'customers.phone',
                    'customers.created_at as customer_joined',
                    'bookings.price',
                    'bookings.booking_date',
                    'bookings.booking_time',
                    'bookings.created_at',
                    'bookings.booking_status_id',
                    'booking_statuses.status',
                    'booking_statuses.color',
                    'booking_statuses.icon'
                )
                ->join('pods','bookings.pod_id','=','pods.id')
                ->join('booking_statuses','bookings.booking_status_id','=','booking_statuses.id')
                ->join('customers','bookings.customer_id','=','customers.id')
                ->orderBy('bookings.id','DESC')
                ->orderBy(request()->sortby, request()->sortbydesc)
                ->when(request()->filter == 1, function($data) {
                    if(request()->status!=''){
                        $myArray = explode(',', request()->status);
                        $data = $data->whereIn('booking_status_id',$myArray);
                    }
                    if(request()->pod_name!=''){
                        $myArray = explode(',', request()->pod_name);
                        $data = $data->whereIn('pod_id',$myArray);
                    }
                    if(request()->start_date!='' && request()->end_date!=''){
                        $start = explode(" ", date('Y-m-d h:i:s', strtotime(request()->start_date)));
                        $start_date = $start[0];
                        $end = explode(" ", date('Y-m-d h:i:s', strtotime(request()->end_date)));
                        $end_date = $end[0];
                        $data = $data->whereBetween('booking_date', [$start_date, $end_date]);
                    }
                    if(request()->q!=''){
                        $data = $data->where('customers.user_name', 'LIKE', '%' . request()->q . '%');
                    }
                })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }

    public function BookingStatusCustomer($customer_id)
    {
        $data = Booking::select('booking_statuses.status','booking_statuses.color','booking_statuses.icon', DB::raw("COUNT(*) as total"))
                ->join('booking_statuses','bookings.booking_status_id','=','booking_statuses.id')
                ->where('bookings.customer_id','=',$customer_id)
                ->groupBy('booking_status_id')
                ->get();
        return response()->json(['status' => 'success', 'data' => $data]);   
    }

    public function BookingPodCustomer($customer_id)
    {
        $data = Booking::select('pods.name', DB::raw("COUNT(*) as total"))
                ->join('pods','bookings.pod_id','=','pods.id')
                ->where('bookings.customer_id','=',$customer_id)
                ->groupBy('pod_id')
                ->orderBy('total','DESC')
                ->get();
        return response()->json(['status' => 'success', 'data' => $data]);   
    }

    public function BookingMonthCustomer($customer_id)
    {
        $data = Booking::select(DB::raw("MONTHNAME(booking_date) as month"),DB::raw("YEAR(booking_date) as year"), DB::raw("COUNT(*) as total"))
                ->where('bookings.customer_id','=',$customer_id)
                ->groupBy(DB::raw("MONTH(booking_date)"))
                ->get();
        return response()->json(['status' => 'success', 'data' => $data]);   
    }
}
