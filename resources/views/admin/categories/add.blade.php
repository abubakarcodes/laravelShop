@extends('admin.layouts.master')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Add Category</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-success">Go back</a>
            </div>
        </div>

    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            @include('admin.layouts.inc.messages')
            {!! Form::open(['route' => 'admin.categories.store']) !!}
            <div class="form-group">
                {{Form::label('Category Name:')}}
                {{Form::input('text' , 'categoryName' , null , ['class' =>'form-control'])}}
            </div>
            {{Form::submit('Submit' , ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>

    </div>
    <br><br>


@endsection
