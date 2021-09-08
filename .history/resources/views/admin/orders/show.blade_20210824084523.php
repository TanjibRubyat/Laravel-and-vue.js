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
                                   <table class="table table-bordered">
                                          <thead>
                                                 <th>Product Name</th>
                                                 <th>Order Quantity</th>
                                                 <th>Price</th>
                                                 <th>Total Price</th>
                                          </thead>
                                          <tbody>
                                                 <tr>
                                                                                                         <td>{{$items->product->id}}</td>
                                                        <td>{{$items->product->name}}</td>
                                                        <td>{{$items->quantity}}</td>
                                                        <td>{{$items->quantity}}</td>
                                                        <td>{{$items->product_price}}</td>
                                                        <td>{{ $items->quantity * $items->product_price}}</td>
                                                 </tr>
                                                 
                                          </tbody>
                                   </table>

                                   <div class="float-right pt-4">
                                        <p>Sub Total : {{$orderDetails->sub_total}}</p>
                                        <p><h5>Grand Total : {{$orderDetails->grand_total}}</h5></p>                                
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