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
<h1>Car Booking Derails</h1>

Customer Name: <h4>{{ $book->name }}</h4>
Customer Email: <h4>{{ $book->email }}</h4>
Customer Phone: <h4>{{ $book->phone }}</h4>

Pick Up Location: <h4>{{ $book->pick_up_location }}</h4>
Drop Off Location: <h4>{{ $book->drop_off_location }}</h4>
Pick Up Date: <h4>{{ $book->pick_up_date }}</h4>
Drop Off Date: <h4>{{ $book->drop_off_date }}</h4>
Pick Up Time: <h4>{{ $book->pick_up_time }}</h4>
Passengers: <h4>{{ $book->passengers }}</h4>

</body>
</html>
