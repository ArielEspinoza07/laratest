@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row justify-content-between">
                <div class="col-4 d-flex ">
                    {{__('Type Foods')}}
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    @if(request()->has('archived'))
                        <a href="{{route('foods.types.index')}}">{{__('All records')}}</a>
                    @else
                        <a href="{{route('foods.types.index')}}?archived=true">{{__('Archived')}} {{__('Type Foods')}}</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            @if(!request()->has('archived'))
                <div class="row justify-content-end">
                    <div class="col-4 d-flex justify-content-end">
                        <a class="btn btn-sm btn-primary" href="{{route('foods.types.create')}}">Create New</a>
                    </div>
                </div>
            @endif
            <div class="">
                <table class="table table-striped">
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
                            <td style="text-align: center" colspan="{{request()->has('archived') ? '9' : '6'}}">There's no type foods available</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            @include('partials._pagination',['model' => $typeFoods])
        </div>
    </div>
@endsection
