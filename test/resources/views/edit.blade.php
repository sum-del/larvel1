<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add</title>
</head>
<body>
<h1>修改会员</h1>
<form action='{{url("user/doedit/$id")}}' method="get">
    姓名:<input type="text" name="name" value="{{$data->name}}">
    <br>
    <br>
    年龄:<input type="text" name="age" value="{{$data->age}}">
    <br>
    <br>
    性别:<input type="text" name="sex" value="{{$data->sex}}">
    <br>
    <br>
    {{ csrf_field() }}
    <input type="submit">
</form>
</body>
</html>

