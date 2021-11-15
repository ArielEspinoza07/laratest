@extends('layouts.app')
@section('content')
    <form action="{{route('foods.types.store')}}" method="post">
        @csrf
        <label for="name">Name</label>
        <input id="name" type="text" name="name">
        <button type="submit">Create</button>
    </form>
@endsection
