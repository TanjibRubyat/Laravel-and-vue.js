@extends('admin.layouts.master')
@section('page-content')
<div class="content-wrapper" style="min-height: 2077.69px;">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products list</h1>
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
                            <th>ID</th>
                            <th>Customer ID</th>
                            <th>Discount</th>
                            <th>Sub Total</th>
                            <th>Grand Total</th>
                            <th>Shipping address</th>
                        </thead>
                        <tbody>
                            @foreach($orders as $orders)
                            <tr>

                                <td>{{$order->id}}</td>
                                <td>{{$order->customer_id}}</td>
                                <td>{{$order->discount}}</td>
                                <td>{{$order->sub_total}}</td>
                                <td>{{$order->grand_total}}</td>
                                <td>{{$order->shipping_address}}</td>
                                <!--<td><a class="btn btn-sm btn-primary" href="{{ route('product.edit',$products->id) }}">Edit</a></td>
                                <td>
                                    <form action="{{ route('product.destroy', $products->id ) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>-->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">??</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">??</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection