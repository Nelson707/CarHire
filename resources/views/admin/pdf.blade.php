<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Car Order Derails</h1>

Customer Name: <h4>{{ $order->name }}</h4>
Customer Email: <h4>{{ $order->email }}</h4>
Customer Phone: <h4>{{ $order->phone }}</h4>
Customer ID: <h4>{{ $order->user_id }}</h4>

Car ID: <h4>{{ $order->car_id }}</h4>
Car Name: <h4>{{ $order->car_name }}</h4>
Daily Price: <h4>{{ $order->daily_price }}</h4>
Pick Up Date: <h4>{{ $order->pick_up_date }}</h4>
Drop Off Date: <h4>{{ $order->drop_off_date }}</h4>
Pick Up Time: <h4>{{ $order->pick_up_time }}</h4>
Chauffeur: <h4>{{ $order->chauffeur }}</h4>
Payment Status: <h4>{{ $order->payment_status }}</h4>
Delivery Status: <h4>{{ $order->delivery_status }}</h4>

</body>
</html>
