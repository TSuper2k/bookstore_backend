<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderRepository
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function getAllOrders()
    {
        $orders = $this->order->get();

        return $orders;
    }

    public function createOrder($data){
        $user_id = Auth::guard('api')->id();

        $total_price = $data->input('totalPrice');

        $order = $this->order->create([
            'user_id' => $user_id,
            'total_price' => $total_price,
            'status' => 'pending'
        ]);

        return $order;
    }
}
