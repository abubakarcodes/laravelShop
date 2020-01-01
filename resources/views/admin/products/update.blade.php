@extends('admin.layouts.master')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Update Product</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('admin.products.index') }}" class="btn btn-outline-success">Go back</a>
            </div>
        </div>

    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            @include('admin.layouts.inc.messages')
            {!! Form::open(['action' => ['ProductsController@update' , $product->id] , 'method' => 'post' , 'enctype' => 'multipart/form-data'] ) !!}
            <div class="form-group">
                {{Form::label('Product Name:')}}
                {{Form::input('text' , 'productName' , $product->product_name , ['class' =>'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('Select Category')}}
               <select class="form-control" id="category" name="category" required="required">
                   <option value="0">--Select Category--</option>
                @foreach($categories->all() as $category)
                @if($category->id == $product->category_id )
                        {{$selected = "selected"}}
                        @else
                        {{$selected = ""}}
                        @endif
                   <option value="{{$category->id}}" {{ $selected }}>{{$category->category_name}}</option>
                   @endforeach
               </select>
            </div>
            <div class="form-group">
                {{Form::label('Product Price:')}}
                {{Form::number('price' , $product->price , ['class' =>'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('Product Description:')}}
                {{Form::textArea('description' , $product->description , ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('Upload Image:')}}
                {{Form::file('productImage' , ['class' => 'form-control-file'])}}
            </div>
              {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit' , ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>

    </div>
    <br><br>


@endsection
