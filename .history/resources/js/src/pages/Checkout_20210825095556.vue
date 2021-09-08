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
          <stripe-checkout
            ref="checkoutRef"
            mode="payment"
            :pk="pk"
            :line-items="lineItems"
            :success-url="successURL"
            :cancel-url="cancelURL"
            @loading="v => loading = v"
          />
          <!-- <button @click="submit">Pay now!</button> -->
          <div class="card-body">
            <div class="checkout_details_area clearfix">
              <form @submit.prevent="placeOrder" method="post">
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
                    <div class="custom-control custom-radio d-block mb-2">
                      <input
                        type="radio"
                        class="custom-control-input"
                        id="customCheck2"
                      />
                      <label class="custom-control-label" for="customCheck2"
                        >Create an accout</label
                      >
                    </div>

                    <div class="payment-method mb-3">
                      <h4>Payment Methods</h4>
                      <hr>
                      <div v-for="(paymentmethod,index) in paymentMethods" :key="index" class="custom-control custom-radio mr-sm-2" >
                        <input type="radio"  class="custom-control-input"  :value="paymentmethod.code" v-model="payment_method"/>
                        <label class="custom-control-label">{{paymentmethod.name}}</label>   
                      </div>
                      <!-- Paypal -->
                    </div>
                    <div class="custom-control custom-radio d-block">
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
                <div
                  class="card-body"
                  v-for="(item, index) in $store.getters.getCartItems"
                  :key="index"
                >
                  <h5>{{ item.name }}</h5>
                  <p>Price: {{ item.price }} Taka</p>
                  <p>Buy Quantity: {{ item.buyQty }}</p>
                </div>
              </div>
              <ul class="summary-table">
                <li>
                  <span>Subtotal:</span>
                  <span>{{ $store.getters.getSubTotal }}</span>
                </li>
                <li><span>delivery:</span> <span>Free</span></li>
                <li>
                  <span>Grandtotal:</span>
                  <span>{{ $store.getters.getSubTotal }}</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </b-container>
</template>

<script>
import Axios from "axios";
import { StripeCheckout } from '@vue-stripe/vue-stripe';
export default {
  components: {
    StripeCheckout,
  },
  data() {
    
    return {
      pk:"pk_test_51JSCqJCc0uiepyfR9NeEJPFZhFWyRGfh9fjzn4QE2ciUeQqnF37NfWR1eBhi1DvlgJZDgFZD6PFOSec2a9X0U8U8007e9xM0ig",
      loading: false,
      successURL: 'your-success-url',
      
      lineItems: [
        {
          price: 'some-price-id', // The id of the one-time price you created in your Stripe dashboard
          quantity: 1,
        },
      ],
      shippingInfo: {
        first_name: "",
        last_name: "",
        email: "",
        address: "",
        zip_code: "",
        phone: "",
        
      },
      paymentMethods:[],
      payment_method: ""
    }
  },

  methods:
  {
    async placeOrder() {
      let orderData = {
        items: this.$store.getters.getCartItems,
        shipping_address: this.shippingInfo.address,
        customer_info: this.shippingInfo,
        sub_total: this.$store.getters.getSubTotal,
        grand_total: this.$store.getters.getSubTotal,
        payment_method: this.payment_method
      };
      let res = await Axios.post("http://localhost:8000/api/place-order",orderData);
      if (res.data.success === true) {
        this.$router.push({ name: "checkout-success" });
      } else {
        this.$router.push({ name: "checkout-failure" });
      }
    },

    
  },
    async beforeMount(){
      let pay = await Axios.get('http://localhost:8000/api/payment-methods')
      if(pay.data.success){
       this.paymentMethods = pay.data.data;
     }else{
       this.errorMessage = pay.data.message
     }
    }
};
</script>