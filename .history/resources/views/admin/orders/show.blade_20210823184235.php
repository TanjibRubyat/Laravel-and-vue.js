@extends('admin.layouts.master')
@section('page-content')
<div class="content-wrapper" style="min-height: 2077.69px;">

       <section class="content-header">
              <div class="container-fluid">
                     <div class="row mb-2">
                            <div class="col-sm-6">
                                   <h1>Category list</h1>
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
                                                 <th>Order ID</th>
                                                 <th>Customer ID</th>
                                                 <th>Customer Name</th>
                                                 <th>Product ID</th>
                                                 <th>Product Name</th>
                                                 <th>Shipping address</th>
                                                 <th>Customer Phone</th>
                                                 <th>Edit</th>
                                                 <th>Delete</th>
                                          </thead>
                                          <tbody>
                                                 
                                                 <tr>

                                                        <td>{{$orderDetails->id}}</td>                                                        
                                                        <td>{{$orderDetails->customer_id}}</td>                                                        
                                                        <td>{{$orderDetails->customer->first_name}}  {{$orderDetails->customer->last_name}}</td>                                                                                                              
                                                        <td>{{$orderDetails->product_id}}</td>
                                                        <td>{{$items->product->name}}</td>
                                                        <td>{{$orderDetails->shipping_address}}</td>
                                                        <td>{{$orderDetails->customer->phone}}</td>
                                                 </tr>
                                                 
                                          </tbody>
                                   </table>
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