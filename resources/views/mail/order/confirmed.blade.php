<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>
<body>
    <div>
        {{ $order->user->first_name }}, Sizning Buyurtmangiz Yaratildi. id - {{ $order->id}}
        buyurtmangiz narxi - {{ $order->sum }} so'm
    </div>
    
</body>
</html>