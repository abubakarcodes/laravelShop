@extends('front.layouts.app')

@section('content')
<div class="container">
 <div class="row">
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
                            <td>{{$user->id}}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <th>Registered At</th>
                            <td>{{$user->created_at}}</td>
                        </tr>

                        </thead>
                    </table>
                </div>
            </div>
        </div>
          
        <div class="col-md-12">
          <br><br>
           @if(!$order->isEmpty())
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
                           
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($order as $order)
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
                               
                            </tr>
                          @endforeach
                           
                            
                        </tbody>
                    </table>
                </div>
                
            </div>
             @else
             <br><br>
              <div class="col-md-6 alert alert-danger">
              You have no orders. Order your items to see orders.
                </div>
               @endif
        </div>
       
       
       
  </div>
@endsection
