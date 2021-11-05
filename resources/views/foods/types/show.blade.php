<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Type Foods</title>
</head>
<body>
<form action="{{route('foods.types.update',['type'=>$type->id])}}" method="post">
    @csrf
    @method('put')
    <label for="name">Name</label>
    <input id="name" type="text" name="name" value="{{$type->name}}">
    <button type="submit">Update</button>
</form>
</body>
</html>
