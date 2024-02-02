<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Product::class, 'product');

    }

    public function index()
    {
        return ProductResource::collection(Product::cursorPaginate(10));
    }


    public function create()
    {
        //
    }


    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->toArray());

        return $this->success('product saved',new ProductResource($product));
    }


    public function show($id)
    {
        return new ProductResource(Product::with('stocks')->findOrFail($id));
    }




    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        Storage::delete($product->photos()->pluck('path')->toArray());
        $product->photos()->delete();
        $product->delete();

        return $this->success('product deleted');

    }

    public function related(Product $product)
    {
        return $this->response(ProductResource::collection(
            Product::query()
                ->where('category_id', $product->category_id)
                ->limit(20)
                ->get()
        ));
    }
}
