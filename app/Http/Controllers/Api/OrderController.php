<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    private $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = $this->orderService->getAllOrders();

        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $order = $this->orderService->createOrder($request);

        return $order;
    }

    // public function store(Request $request)
    // {
    //     $user_id = Auth::guard('api')->id();
    //     $total_price = $request->input('totalPrice');

    //     $order = new Order;
    //     $order->user_id = $user_id;
    //     $order->total_price = $total_price;
    //     $order->status = 'pending';
    //     $order->save();

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Order created successfully.',
    //     ]);
    // }
}
