<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\DeliveryMethodController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentCardTypeController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPhotoController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StatusOrderController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserPaymentCardsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPhotoController;
use App\Http\Controllers\UserSettingController;
use App\Models\Discount;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('products/{product}/related', [ProductController::class, 'related']);
Route::post('roles/assign', [RoleController::class, 'assign']);
Route::post('permissions/assign', [PermissionController::class, 'assign']);



Route::apiResources([
    'discounts' => DiscountController::class,
    'users' => UserController::class,
    'users.photos' => UserPhotoController::class,
    'orders' => OrderController::class,
    'photos' => PhotoController::class,
    'roles' => RoleController::class,
    'permissions' => PermissionController::class,
    'categories' => CategoryController::class,
    'products' => ProductController::class,
    'categories.products' => CategoryProductController::class,
    'statuses' => StatusController::class,
    'statuses.orders' => StatusOrderController::class, 
    'favorites' => FavoriteController::class,
    "delivery-methods" => DeliveryMethodController::class,
    "payment-types" => PaymentTypeController::class,
    "user-addresses" => UserAddressController::class,
    "user-payment-cards" => UserPaymentCardsController::class,
    'reviews' => ReviewController::class,
    'products.reviews' => ProductReviewController::class,
    'settings' => SettingController::class,
    'products.photos' => ProductPhotoController::class,
    'user-settings' => UserSettingController::class,
    'payment-card-types' => PaymentCardTypeController::class,
]);

