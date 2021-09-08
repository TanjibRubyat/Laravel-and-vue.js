<template>
  <b-container class="cart-table-area section-padding-100">
    <b-row>
      <b-col>
        <h3 class="p-2 mt-3 bg-info text-white text-center">Checkout Page</h3>
      </b-col>
    </b-row>
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="checkout_details_area clearfix">
          <form action="#" method="post">
            <div class="row">
              <div class="col-md-6 mb-3">
                <input
                  type="text"
                  class="form-control"
                  id="first_name"
                  v-model="shippingInfo.first_name"
                  value=""
                  placeholder="First Name"
                  required
                />
              </div>
              <div class="col-md-6 mb-3">
                <input
                  type="text"
                  class="form-control"
                  id="last_name"
                  v-model="shippingInfo.last_name"
                  value=""
                  placeholder="Last Name"
                  required
                />
              </div>
              <div class="col-12 mb-3">
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  v-model="shippingInfo.email"
                  placeholder="Email"
                  value=""
                />
              </div>
          
              <div class="col-12 mb-3">
                <input
                  type="text"
                  class="form-control mb-3"
                  id="street_address"
                  v-model="shippingInfo.address"
                  placeholder="Address"
                  value=""
                />
              </div>
          
              <div class="col-md-6 mb-3">
                <input
                  type="text"
                  class="form-control"
                  id="zipCode"
                  v-model="shippingInfo.zip_code"
                  placeholder="Zip Code"
                  value=""
                />
              </div>
              <div class="col-md-6 mb-3">
                <input
                  type="string"
                  class="form-control"
                  id="phone_number"
                  v-model="shippingInfo.phone"
                  min="0"
                  placeholder="Phone No"
                  value=""
                />
              </div>
        
              <div class="col-12">
                <div class="custom-control custom-checkbox d-block mb-2">
                  <input
                    type="checkbox"
                    class="custom-control-input"
                    id="customCheck2"
                  />
                  <label class="custom-control-label" for="customCheck2"
                    >Create an accout</label
                  >
                </div>
                <div class="custom-control custom-checkbox d-block">
                    <button class="btn btn-warning">Place Order</button>
                </div>
              </div>
            </div>
          </form>
        </div>
            </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
          <div class="card">
              <div class="card-body">
                    <div class="cart-summary">
          <h5>Cart Total</h5>
          <div>
            <div class="card-body" v-for="(item, index) in $store.getters.getCartItems" :key="index">
              <h5>{{ item.name }} </h5>
              <p>Price: {{ item.price }} Taka </p>
              <p>Buy Quantity: {{ item.buyQty }} </p>
            </div>
          </div>
          <ul class="summary-table">
            <li><span>Subtotal:</span> <span>{{$store.getters.getSubTotal}}</span></li>
            <li><span>delivery:</span> <span>Free</span></li>
            <li><span>Grandtotal:</span> <span>{{$store.getters.getSubTotal}}</span></li>
          </ul>

          <div class="payment-method">
            <!-- Cash on delivery -->
            <div class="custom-control custom-checkbox mr-sm-2">
              <input
                type="checkbox"
                class="custom-control-input"
                id="cod"
                checked
              />
              <label class="custom-control-label" for="cod"
                >Cash on Delivery</label
              >
            </div>
            <!-- Paypal -->
            <div class="custom-control custom-checkbox mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="paypal" />
              <label class="custom-control-label" for="paypal"
                >Paypal <img class="ml-15" src="img/core-img/paypal.png" alt=""
              /></label>
            </div>
          </div>

          
              </div>
          </div>
      </div>
      </div>
    </div>
  </b-container>
</template>

<script>
export default {
  data(){
    return {
      shippingInfo:{
        'first_name':'',
        'last_name':'',
        'email':'',
        'address':'',
        'zip_code':'',
        'phone':''
      }
    }
  }
}
</script>