<?php

namespace App\Http\Controllers\Index;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function addBasket(Request $request)
    {
        $result['success'] = FALSE;
        $result['message'] = 'Этот товар уже есть в корзине';
        $inputs = $request->all();
        if (!$this->checkSession($inputs['product'])){
            $collect = ['id'=>$inputs['product'],'count'=> isset($inputs['counter']) ? $inputs['counter'] : 1];
            Session::push('products',$collect);
            $result['success'] = TRUE;
            $result['message'] = 'Товар успешно добавлен';

        }
        return $result;
    }

    public function deleteBasket(Request $request)
    {
        $inputs = $request->all();
        $result['success'] = FALSE;
        $result['message'] = 'При удалении возникла ошибка';
        $sessions  = Session::get('products');
        if (count($sessions)){
            Session::forget('products');
            foreach ($sessions as $session) {
                if ($session['id'] != $inputs['product'])
                    $collect = ['id'=>$session['id'],'count'=> $session['count']];
            }
            if (count($sessions) > 1)
            Session::push('products',$collect);
            $result['success'] = TRUE;
            $result['message'] = 'Товар успешно удален';
        }

        return $result;
    }

    public function checkSession($productId)
    {
        $result = FALSE;
        $sessions  = Session::get('products');
        if (count($sessions)){
            foreach ($sessions as $session) {
                if ($session['id'] == $productId)
                    $result = TRUE;
            }
        }
        return $result;
    }

    public function OrdersBasket(Request $request)
    {
        $result['success'] = FALSE;
        $result['message'] = 'Не удалось оформит данный заказ!';
        if (!Auth::check()){
            $result['message'] = 'Для оформление заказа нужна войти личный кабинет';
        }else{
            $result['success'] = TRUE;
            $result['message'] = 'Ваша покупка успешно оформлено';

            $inputs = $request->all();
            if (count($inputs['products'])){
                $auth = Auth::user();
                $order = Order::create(['user_id' =>$auth->id, 'status' =>0]);
                foreach ($inputs['products'] as $product) {
                    OrderProduct::create([
                        'order_id'=>$order->id,
                        'product_id' =>$product['product_id'],
                        'count'=>$product['count']
                    ]);
                }
                Session::forget('products');
            }
        }
        return response()->json($result);
    }


}
