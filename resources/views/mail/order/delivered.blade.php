<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivered</title>
</head>
<body>
    Hurmatli {{ $order->user->first_name }} {{ $order->user->last_name }}, sizning buyutmangiz yetkazildi!!!
    buyurtma id - {{ $order->id}}
    buyurtma narxi - {{ $order->sum }}
</body>
</html>