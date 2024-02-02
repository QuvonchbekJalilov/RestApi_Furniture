<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping</title>
</head>

<body>
    Hurmatli {{ $order->user->first_name }} {{ $order->user->last_name }}, siz buyurmangiz yo'lga chiqdi!!!
    buyutma id - {{ $order->id}}
    buyurtma narxi - {{ $order->sum}}
    
    Yetkazib berish manzili: {{ $order->address['region'] ?? '' }}, {{ $order->address['district'] ?? '' }}, {{ $order->address['street'] ?? '' }}, {{ $order->address['home'] ?? '' }}
   
</body>

</html>