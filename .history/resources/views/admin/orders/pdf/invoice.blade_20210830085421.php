<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Order-Invoice</title>
       <style>
              .float-right{
                     float: right;
              }
       </style>
</head>

<body>
       <div class="content-wrapper">
              <header>
                     <h4>ESHOP ORDER INVOICE</h4>
                     <p>Order no: #</p>
              </header>
              <hr>
              <div class="content">
                            <div class="card-body">
                                   <h4>Order Details</h4>
                                   <p>Order Id: {{$orderDetails->id}}</p>
                                   <p>Payment Method: {{$orderDetails->payment_method}}</p>
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
                                                        <td>{{$item->quantity * $item->product_price}}</td>
                                                 </tr>
                                                 @endforeach
                                                 <tr>
                                                        <td colspan="3">Sub Total: </td>
                                                 </tr>
                                          </tbody>
                                   </table>

                                   <div class="float-right">
                                          <p>Sub Total : {{$orderDetails->sub_total}}</p>
                                          <p>
                                          <h5>Grand Total : {{$orderDetails->grand_total}}</h5>
                                          </p>
                                   </div>

                            </div>
              </div>
       </div>
</body>

</html>