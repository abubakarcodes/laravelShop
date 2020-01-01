@extends('admin.layouts.master')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Users</h1>

    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-success">Go back</a>
        </div>
    </div>
</div>
@include('admin.layouts.inc.messages')
   <div class="content table-responsive table-full-width">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registered at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                          <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td> {{link_to_route('admin.user.details' , 'Details' , $user->id, ['class' => 'btn btn-primary btn-sm'])}}</td>
                          </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
@endsection
