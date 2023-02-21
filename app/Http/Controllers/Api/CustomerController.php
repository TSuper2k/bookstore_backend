<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    public function store(Request $request)
    {
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = $request->password;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();
        return response()->json($customer, 200);
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            return response()->json($customer);
        } else {
            return response()->json(['message' => 'Không tìm thấy khách hàng'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $customer->name = $request->name ?? $customer->name;
            $customer->email = $request->email ?? $customer->email;
            $customer->password = $request->password ?? $customer->password;
            $customer->phone = $request->phone ?? $customer->phone;
            $customer->address = $request->address ?? $customer->address;
            $customer->save();
            return response()->json($customer);
        } else {
            return response()->json(['message' => 'Không tìm thấy khách hàng'], 404);
        }
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $customer->delete();
            return response()->json(['message' => 'Xóa khách hàng thành công']);
        } else {
            return response()->json(['message' => 'Không tìm thấy khách hàng'], 404);
        }
    }
}
