<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductPhotoRequest;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductPhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Product $product)
    {
        return $this->response($product->photos);
    }

    public function store(StoreProductPhotoRequest $request, Product $product)
    {
        foreach ($request->photos as $photo) {
            $path = $photo->store('products/' . $product->id, 'public');
            $full_name = $photo->getClientOriginalName();

            $product->photos()->create([
                'photo' => $full_name,
                'path' => $path
            ]);
        }

        return $this->success('product photo was successfully stored');
    }

    public function destroy(Photo $photo)
    {
        Gate::authorize('product:destroy');

        Storage::delete($photo->path);
        $photo->delete();

        return $this->success('Product photo deleted successfully');
    }
}
