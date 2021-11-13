<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProductGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $user = Auth::user();
            if ($user->order() == null) {
                echo 'kkt';
                $order = new Order();
                $order->user()->save($user);
                $order->customerInfo()->save($user->customerInfo());
            } else {
                echo 'kkt1';
                $order = $user->order();
            }
        } else {
            if (Session::get('order')) {
                echo 'kkt2';
                $order = Session::get('order');
            } else {
                echo 'kkt3';
                $order = new Order(null, null, null);
                Session::put('order', $order);
            }
        }

        return view('shoppingCart')->with('order', $order);
    }
}
