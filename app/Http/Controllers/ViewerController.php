<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Order;
use App\Models\Style;
use Illuminate\Http\Request;

class ViewerController extends Controller
{
    public function dashboard(){
        $total_buyer = Buyer::count();
        $total_order = Order::count();
        $total_style = Style::count();
        $total_running_style = Style::where('status',0)->count();
        $total_completed_style = Style::where('status',1)->count();
        $page_title = 'Dashboard';
        $page_message = 'Store Management Application';
        return view('viewers.dashboard',compact(['page_title', 'page_message','total_buyer','total_order','total_style','total_running_style','total_completed_style']));
    }

    public function knitting(){

        $orders = Order::join('yarn_bookings', 'orders.id', '=', 'yarn_bookings.order_id')
                         ->join('buyers', 'buyers.id', '=', 'orders.buyer_id')
                         ->where('yarn_bookings.status', 'booked')
                         ->select('orders.id', 'orders.order_no', 'buyers.buyer_name')
                         ->get();

         return view('viewers.yarnBooking', [
             'page_title' => 'Booking',
             'page_message' => 'Booking your accessories of a style',
             'orders' => $orders,
         ]);
     }
}
