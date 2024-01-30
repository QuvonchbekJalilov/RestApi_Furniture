<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Product;
use App\Models\Stock;
use App\Models\UserAddress;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Order::class, 'order');
    }

    public function index()
    {
        if(request()->has('status_id')){
            return $this->response(OrderResource::collection(auth()->user()->orders()->where('status_id', request('status_id'))->paginate(10)));
        }

        return $this->response(OrderResource::collection(auth()->user()->orders()->paginate(10)));
    }


    public function store(StoreOrderRequest $request)
    {
        $sum = 0;
        $product = [];
        $notFoundProducts = [];
        $address = UserAddress::find($request->address_id);

        foreach ($request['products'] as $requestProduct) {
            $product = Product::with('stocks')->findOrFail($requestProduct['product_id']);
            $product->quantity = $requestProduct['quantity'];
            
            if (
                $product->stocks()->find($requestProduct['stock_id']) &&
                $product->stocks()->find($requestProduct['stock_id'])->quantity >= $requestProduct['quantity']
            ) {




                $productWithStock = $product->withStock($requestProduct['stock_id']);
                $productResource = (new ProductResource($productWithStock))->resolve();
                $sum += $productResource['discounted_price'] ?? $productResource['price'];
                $products[] = $productResource;
            } else {
                $requestProduct['we_have'] = $product->stocks()->find($requestProduct['stock_id'])->quantity;
                $notFoundProducts[] =  $requestProduct;
            }
        }


        if ($notFoundProducts == [] && $product != [] && $sum != 0) {
            $order = auth()->user()->orders()->create([
                'comment' => $request->comment,
                "delivery_method_id" => $request->delivery_method_id,
                "payment_type_id" => $request->payment_type_id,
                'address' => $address,
                'status_id' => in_array($request['payment_type_id'], [1, 2]) ? 1 : 6,
                "sum" => $sum,
                'products' => $products,
            ]);

            if ($order) {
                foreach ($products as $product) {
                    $stock = Stock::find($product['inventory'][0]['id']);
                    $stock->quantity -= $product['order_quantity'];
                    $stock->save();
                }
            }
            return $this->success('Order created successfully', $order);
        } else {
            return $this->error(
                'some products not found or does not have in inventory',
                ['products' => $notFoundProducts]
            );
        }

        //     return 'SOMETHING WENT WRONG';
    }


    public function show(Order $order)
    {
        return $this->response( new OrderResource($order));
    }


    public function edit(Order $order)
    {
        //
    }


    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }


    public function destroy(Order $order)
    {
        $order->delete();
        return 1;
    }
}
