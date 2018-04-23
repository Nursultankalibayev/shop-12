<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Callback;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    public function getOrders()
    {
        $rows['orders'] = Order::latest('id')->paginate(20);
        return view('admin.show.order',compact('rows'));
    }

    public function getOrderSingle($id)
    {
        $rows['orderProduct'] = OrderProduct::join('orders as o','order_products.order_id','=','o.id')
            ->join('users as u','o.user_id','=','u.id')
            ->join('products as p','order_products.product_id','=','p.id')
            ->join('images as i','p.id','=','i.product_id')
            ->where('i.type',1)
            ->where('order_products.order_id',$id)
            ->select('p.*',DB::raw("CONCAT(u.last_name,' ',u.first_name) full_name"),'i.image','order_products.count','o.id as order_id')
            ->get();
        return view('admin.show.order_product',compact('rows'));
    }

    public function orderDelete(Request $request)
    {
        $result['success'] = TRUE;
        $inputs = $request->all();

        Order::where('id',$inputs['id'])->delete();
        OrderProduct::where('order_id',$inputs['id'])->delete();

        return $result;
    }

    public function getCallback()
    {
        $rows['callbacks'] = Callback::latest('id','desc')->paginate(20);
        return view('admin.show.callback',compact('rows'));
    }
    public function deleteCallback(Request $request)
    {
        $result['success'] = TRUE;
        $inputs = $request->all();
        Callback::where('id',$inputs['id'])->delete();
        return $result;
    }
}