<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMethod;
use App\Models\Order;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\LazyCollection;

class StatsController extends Controller
{
    public function ordersCount(Request $request)
    {
        /**
         * count the number of orders
         */
        $from = Carbon::now()->subMonth();
        $to = Carbon::now();

        if ($request->has(['from', 'to'])) {
            $from = $request->from;
            $to = $request->to;
        }

        return $this->response(
            Order::query()
                ->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])
                ->whereRelation('status', 'code', 'closed')
                ->count()
        );
    }

    public function ordersSalesSum(Request $request)
    {
        /**
         * count the number of orders
         */
        $from = Carbon::now()->subMonth();
        $to = Carbon::now();

        if ($request->has(['from', 'to'])) {
            $from = $request->from;
            $to = $request->to;
        }
        
        return $this->response(
            Order::query()
                ->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])
                ->whereRelation('status', 'code', 'closed')
                ->sum('sum')
        );
    }


    public function deliveryMethodsRatio(Request $request)
    {

        if(Cache::has('deliveryMethodsRatio')){
            return Cache::get('deliveryMethodsRatio');
        }
        $from = Carbon::now()->subMonth();
        $to = Carbon::now();

        if ($request->has(['from', 'to'])) {
            $from = $request->from;
            $to = $request->to;
        }
        $response = [];
        $allOrders = Order::query()
            ->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])
            ->whereRelation('status', 'code', 'closed')
            ->count();


        foreach (DeliveryMethod::all() as $deliveryMethod) {
            $deliveryMethodOrders = $deliveryMethod
                ->orders()
                ->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])
                ->whereRelation('status', 'code', 'closed')
                ->count();
            $response[] = [
                'name' => $deliveryMethod->getTranslations('name'),
                'percentage' => $deliveryMethodOrders * 100 / $allOrders,
                'amount' => $deliveryMethodOrders
            ];
        }

        Cache::put('deliveryMethodsRatio', $response);
        return $this->response($response);
    }

    public function ordersCountByDays(Request $request){
        $from = Carbon::now()->subMonth();
        $to = Carbon::now();

        if ($request->has(['from', 'to'])) {
            $from = $request->from;
            $to = $request->to;
        }

        $days = CarbonPeriod::create($from, $to);
        $response = new Collection();
        LazyCollection::make($days->toArray())->each(function($day) use ($from, $to, $response){
            $count = Order::query()
            ->whereBetween('created_at', [$day->startOfDay(), $day->endOfDay()])
            ->whereRelation('status', 'code', 'closed')
            ->count();

            $response[] = [
                'date' => $day->format('Y-m-d'),
                'orders_count' => $count,
            ];
        });


        return $this->response($response);


    }
}
