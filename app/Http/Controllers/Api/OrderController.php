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
        $user = Auth::user();
        $order = new Order;
        $order->user_id = $user->id;
        $order->total_price = $request->totalPrice;
        $order->status = '1';
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
