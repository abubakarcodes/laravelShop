@extends('admin.layouts.master')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Order Details</h1>

    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{ route('admin.orders') }}" class="btn btn-success">Go back</a>
        </div>
    </div>
</div>
@include('admin.layouts.inc.messages')
    <div class="row">
       
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Order Details</h4>
                
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                               <td>{{$order->id}}</td>
                               <td>{{$order->date}}</td>
                                        
                               
                               <td>{{$order->address}}</td>
                               <td>
                                    @if($order->status)
                                       <span class="badge badge-success">Confirmed</span>
                                       @else
                                       <span class="badge badge-warning">Pending</span>
                                       @endif
                               </td>
                               <td>
                                    @if($order->status)
                                  {{link_to_route('admin.order.pending' , 'Pending' , $order->id, ['class' => 'btn btn-warning btn-sm'])}}
                                  @else
                                   {{link_to_route('admin.order.confirm' , 'Confirm' , $order->id, ['class' => 'btn btn-success btn-sm'])}}
                                   @endif

                                   
                               </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">User Details</h4>
                </div>
                <div class="content table-responsive table-full-width ">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <td>{{$order->user->id}}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$order->user->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$order->user->email}}</td>
                        </tr>
                        <tr>
                            <th>Registered At</th>
                            <td>{{$order->user->created_at}}</td>
                        </tr>

                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Product Details</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped table-sm">
                        <tr>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                        </tr>
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>
                                <table class="table table-primary">
                                     @foreach($order->product as $product)
                                  <tr>
                                       
                                    <td>  {{$product->product_name}} </td>
                                
                                  </tr>
                                   @endforeach
                                </table>
                            </td>
                            <td>
                                 <table class="table table-primary">
                                  @foreach($order->orderItems as $item)

                                  <tr>
                                      <td> {{$item->price}}</td>
                                  </tr>
                                 
                                  @endforeach
                              </table>
                            </td>
                            <td>
                                <table class="table table-primary">
                                  @foreach($order->orderItems as $item)

                                  <tr>
                                      <td> {{$item->quantity}}</td>
                                  </tr>
                                 
                                  @endforeach
                              </table>
                            </td>

                            <td>  

                                <table class="table table-primary">
                                    @foreach($order->product as $product)
                                    <tr>
                                        <td>
                                             <img style="width:30px; height:30px" src="{{ asset("storage/storage/$product->image_name") }}"> 
                                        </td>
                                    </tr>
                               
                                @endforeach
                                </table>   
                                
                            </td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>

  
@endsection
