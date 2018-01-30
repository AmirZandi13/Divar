<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>
<div class="container">
    <div style="height: 400px;" class="jumbotron">
        <div style="float: left">
            <h1>{{$advertise->title}}</h1>
            <p>{{$advertise->description}}</p>
            <p>name : {{$user->name}}</p>
            <p>email : {{$user->email}}</p>
        </div>
        <div style="float: right">
            <img src="{{$advertise->image['thumb']}}" alt="">
        </div>
    </div>

</div>
</body>
</html>