@extends('admin.layouts.master')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Categories</h1>

    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Add Category</a>
        </div>
    </div>
</div>
@include('admin.layouts.inc.messages')
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
           
            <th>Actions</th>
           

        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->category_name}}</td>
            

            <td class="d-inline-flex">
                <a  href="{{ route('admin.categories.edit' , $category->id) }}"  class="btn btn-primary btn-sm d-inline">Edit</a>
                <div class="d-inline">
                    {!! Form::open(['action' => ['CategoryController@destroy', $category->id], 'method' => 'post']) !!}
                {{Form::hidden('_method', 'Delete')}}      
               {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm' , 'onclick' => ' return confirm("Are You Sure to Delete?")']) !!}
       
               {!! Form::close() !!}
                </div>
                
           
                
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>

@endsection
