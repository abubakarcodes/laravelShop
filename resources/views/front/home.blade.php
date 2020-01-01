@extends('front.layouts.app')

@section('content')
<div class="container">


	
   
          <!-- Jumbotron Header -->
        <header class="jumbotron my-4">
            <h5 class="display-3"><strong>Welcome,</strong></h5>
            <p class="display-4"><strong>SALE UPTO 50%</strong></p>
            <p class="display-4">&nbsp;</p>
            <a href="#" class="btn btn-warning btn-lg float-right">SHOP NOW!</a>
        </header>
    @if ( session()->has('msg') )
        <div class="alert alert-success">{{ session()->get('msg') }}</div>
    @endif


    <div class="row text-center">


    @foreach ($products as $product)
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <img style="width:100%; height: 230px;" class="align-content-center card-img-top img-fluid" src="{{ url('/storage/storage') . '/' . $product->image_name }}" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="card-text">
                       {{substr($product->description, 0, 80)  }}
                    </p>
                </div>
                <div class="card-footer">
                    <strong>${{ $product->price }}</strong> &nbsp;
                    <form action="#" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input  type="hidden" name="price" value="{{ $product->price }}">
                    <button type="submit" class="btn  btn-outline-dark"><i class="fa fa-cart-plus "></i> Add To
                        Cart</button>
                    </form>
                </div>
            </div>
        </div>

        @endforeach
	
    </div>
<div class="pagination justify-content-center">{{$products->links()}}</div>
    </div>

    

@endsection
