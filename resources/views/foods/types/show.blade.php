@extends('layouts.app')
@section('content')
    <form action="{{route('foods.types.update',['type'=>$type->id])}}" method="post">
        @csrf
        @method('put')
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{$type->name}}">
        <button type="submit">Update</button>
    </form>
@endsection
