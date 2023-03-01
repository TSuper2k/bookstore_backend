<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    private $order;
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        $books = $this->order->get();

        return response()->json($books);
    }

    public function store(Request $request)
    {
        $user_id = Auth::guard('api')->id();
        $total_price = $request->input('totalPrice');

        $order = new Order;
        $order->user_id = $user_id;
        $order->total_price = $total_price;
        $order->status = 'pending';
        $order->save();

        $books = $request->books;

        foreach ($books as $book) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->book_id = $book['id'];
            $orderDetail->quantity = $book['quantity'];
            $orderDetail->price = $book['price'];
            $orderDetail->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Order created successfully.',
        ]);
    }
}
