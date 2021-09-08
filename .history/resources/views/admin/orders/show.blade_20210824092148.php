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
                                   <p>Order Delivery Status: Pending </p>
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

                                   <div class="pt-4">
                                          <p>Sub Total : {{$orderDetails->sub_total}}</p>
                                          <p>
                                          <h5>Grand Total : {{$orderDetails->grand_total}}</h5>
                                          </p>
                                          <form action="" method="post">
                                          <select class="form-select" aria-label="Default select example">
                                                 <option selected>Open this select menu</option>
                                                 <option value="1">Order in progress</option>
                                                 <option value="2">Order in transit</option>
                                                 <option value="3">Order Delivered</option>
                                          </select>
                                   </form>
                                   </div>

                            </div>
                            <!-- /.card-body -->
                            
                            <div class="card-footer clearfix">
                                   <ul class="pagination pagination-sm m-0 float-right">
                                          <li class="page-item"><a class="page-link" href="#">«</a></li>
                                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                                          <li class="page-item"><a class="page-link" href="#">»</a></li>
                                   </ul>
                            </div>
                     </div>
              </div>
       </section>
       <!-- /.content -->
</div>

@endsection