@extends('admin.layouts.master')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Products</h1>

    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="products/create" class="btn btn-success">Add Product</a>
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
            <th>Price</th>
            <th>Description</th>
            <th>Product Image</th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody>
        @foreach($products->all() as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->product_name}}</td>
            <td>{{$product->price}}</td>
            <td>{{substr($product->description, 0 , 100)}}</td>
             <td><img style="width:30px; height:30px" class="img-thumbnail img-responsive" src="{{ asset("storage/storage/$product->image_name") }}"></td>



            <td class="d-inline-flex">
                <a  href="{{ route('admin.products.edit' , $product->id) }}"  class="btn btn-primary btn-sm">Edit</a>
                <div class="d-inline">
                    {!! Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'post']) !!}
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
