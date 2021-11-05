<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Type Foods</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td, th {
            border: 1px solid #000;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<a href="{{route('foods.types.create')}}">Create New</a>
@if(request()->has('archived'))
    <a href="{{route('foods.types.index')}}">All records</a>
@else
    <a href="{{route('foods.types.index')}}?archived=true">Archived</a>
@endif
<table >
    <thead >
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Created by</th>
        <th>Updated by</th>
        @if(request()->has('archived'))
            <th>Deleted by</th>
        @endif
        <th>Created at</th>
        <th>Updated at</th>
        @if(request()->has('archived'))
            <th>Deleted at</th>
        @endif
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($typeFoods as $typeFood)
        <tr>
            <td>{{$typeFood->id}}</td>
            <td>{{$typeFood->name}}</td>
            <td>{{$typeFood->createdBy->name}}</td>
            <td>{{$typeFood->updatedBy->name ?? 'N/A'}}</td>
            @if(request()->has('archived'))
                <td>{{$typeFood->deletedBy->name ?? 'N/A'}}</td>
            @endif
            <td>{{$typeFood->created_at->format('Y-m-d')}}</td>
            <td>{{$typeFood->updated_at->format('Y-m-d')}}</td>
            @if(request()->has('archived'))
                <td>{{$typeFood->deleted_at->format('Y-m-d')}}</td>
            @endif
            <td>
                @if(!request()->has('archived'))
                    <a href="{{route('foods.types.show',['type'=>$typeFood->id])}}">Show</a>
                @endif
                @if(request()->has('archived'))
                    <a href="{{route('foods.types.restore',['type'=>$typeFood->id])}}" onclick="event.preventDefault();document.getElementById('restore-food-type-{{$typeFood->id}}').submit();">Restore</a>
                    <form id="restore-food-type-{{$typeFood->id}}" action="{{route('foods.types.restore',['type'=>$typeFood->id])}}" method="POST" style="display: none">
                        @csrf
                        {{method_field('patch')}}
                        @method('patch')
                    </form>
                @else
                    <a href="{{route('foods.types.destroy',['type'=>$typeFood->id])}}" onclick="event.preventDefault();document.getElementById('delete-food-type-{{$typeFood->id}}').submit();">Delete</a>
                    <form id="delete-food-type-{{$typeFood->id}}" action="{{route('foods.types.destroy',['type'=>$typeFood->id])}}" method="POST" style="display: none">
                        @csrf
                        @method('delete')
                    </form>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td style="text-align: center" colspan="{{request()->has('archived') ? '8' : '6'}}">There's no type foods available</td>
        </tr>
    @endforelse
    </tbody>
</table>
Showing {{$typeFoods->firstItem()}} of {{$typeFoods->lastItem()}}
{{$typeFoods->links()}}
</body>
</html>
