@extends('admin.layouts.master')
@section('page-content')
<div class="content-wrapper" style="min-height: 2077.69px;">

       <section class="content-header">
              <div class="container-fluid">
                     <div class="row mb-2">
                            <div class="col-sm-6">
                                   <h1>Order Details</h1>
                            </div>

                     </div>
              </div>
       </section>


       <section class="content">
              <div class="container-fluid">
                     <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                   <h4>Order Details</h4>
                                   <hr>
                                   <p>Order Id: {{$orderDetails->id}}</p>
                                   <p>Order Delivery Status: {{$orderDetails->order_status}} </p>
                                   <p>Customer Name: {{$orderDetails->customer->full_name}}</p>
                                   <p>Customer Phone: {{$orderDetails->customer->phone}}</p><br><br>
                                   <h4>Order Items</h4>
                                   <table class="table table-bordered">
                                          <thead>
                                                 <th>Product Name</th>
                                                 <th>Order Quantity</th>
                                                 <th>Price</th>
                                                 <th>Total Price</th>
                                          </thead>
                                          <tbody>
                                                 @foreach($items as $item)
                                                 <tr>
                                                        <td>{{$item->product->name}}</td>
                                                        <td>{{$item->quantity}}</td>
                                                        <td>{{$item->product_price}}</td>
                                                        <td>{{ $item->quantity * $item->product_price}}</td>
                                                 </tr>
                                                 @endforeach
                                          </tbody>
                                   </table>

                                   <div class="float-right pt-4">
                                          <p>Sub Total : {{$orderDetails->sub_total}}</p>
                                          <p>
                                          <h5>Grand Total : {{$orderDetails->grand_total}}</h5>
                                          </p>
                                   </div>

                            </div>
                            <!-- /.card-body -->
                            <div>
                                   <form action="{{route('order.change-status',$orderDetails->id)}}" method="post">
                                          @csrf
                                          <select name="order_status" class="form-select p-2" aria-label="Default select example">
                                                 <option>---Choose status---</option>
                                                 <option selected value="in_progress">Order in progress</option>
                                                 <option value="in_transit">Order in transit</option>
                                                 <option value="complete">Order Delivered</option>
                                          </select>
                                          <button type="submit" class="btn btn-primary">Change Status</button>
                                   </form>
                            </div>

                     </div>
              </div>
       </section>
       <!-- /.content -->
</div>

@endsection