@extends('layouts.app')
@section('content')
   <div class="card">
       <div class="card-header">
           <div class="row justify-content-between">
               <div class="col-4 d-flex ">
                   {{__('Users')}}
               </div>
               <div class="col-4 d-flex justify-content-end align-items-center">
                   @if(request()->has('archived'))
                       <a href="{{route('settings.users.index')}}">{{__('All records')}}</a>
                   @else
                       <a href="{{route('settings.users.index')}}?archived=true">{{__('Archived')}} {{__('Users')}}</a>
                   @endif
               </div>
           </div>
       </div>
       <div class="card-body">
           @if(!request()->has('archived'))
               <div class="row justify-content-end">
                   <div class="col-4 d-flex justify-content-end">
                       <a class="btn btn-sm btn-primary" href="{{route('settings.users.create')}}">Create New</a>
                   </div>
               </div>
           @endif
           <div class="">
               <table class="table table-striped">
                   <thead >
                   <tr>
                       <th>#</th>
                       <th>Name</th>
                       <th>Email</th>
                       <th>Email Verified at</th>
                       <th>Created at</th>
                       <th>Updated at</th>
                       @if(request()->has('archived'))
                           <th>Deleted at</th>
                       @endif
                       <th>Actions</th>
                   </tr>
                   </thead>
                   <tbody>
                   @forelse($users as $user)
                       <tr>
                           <td>{{$user->id}}</td>
                           <td>{{$user->name}}</td>
                           <td>{{$user->email}}</td>
                           <td>{{$user->email_verified_at->format('Y-m-d') ?? 'N/A'}}</td>
                           <td>{{$user->created_at->format('Y-m-d')}}</td>
                           <td>{{$user->updated_at->format('Y-m-d')}}</td>
                           @if(request()->has('archived'))
                               <td>{{$user->deleted_at->format('Y-m-d')}}</td>
                           @endif
                           <td>
                               @if(!request()->has('archived'))
                                   <a href="{{route('settings.users.show',['user'=>$user->id])}}">Show</a>
                               @endif
                               @if(request()->has('archived'))
                                   <a href="{{route('settings.users.restore',['user'=>$user->id])}}" onclick="event.preventDefault();document.getElementById('restore-user-{{$user->id}}').submit();">Restore</a>
                                   <form id="restore-user-{{$user->id}}" action="{{route('settings.users.restore',['user'=>$user->id])}}" method="POST" style="display: none">
                                       @csrf
                                       {{method_field('patch')}}
                                       @method('patch')
                                   </form>
                               @else
                                   <a href="{{route('settings.users.destroy',['user'=>$user->id])}}" onclick="event.preventDefault();document.getElementById('delete-user-{{$user->id}}').submit();">Delete</a>
                                   <form id="delete-user-{{$user->id}}" action="{{route('settings.users.destroy',['user'=>$user->id])}}" method="POST" style="display: none">
                                       @csrf
                                       @method('delete')
                                   </form>
                               @endif
                           </td>
                       </tr>
                   @empty
                       <tr>
                           <td style="text-align: center" colspan="{{request()->has('archived') ? '8' : '7'}}">There's no type foods available</td>
                       </tr>
                   @endforelse
                   </tbody>
               </table>
           </div>
       </div>
       <div class="card-footer">
           @include('partials._pagination',['model' => $users])
       </div>
   </div>
@endsection
