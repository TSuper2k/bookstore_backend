<?php

namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getAllOrders(){
        return $this->orderRepository->getAllOrders();
    }

    public function createOrder($data){
        return $this->orderRepository->createOrder($data);
    }
}
