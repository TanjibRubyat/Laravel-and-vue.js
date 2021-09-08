<template>
    <b-container class="cart-table-area section-padding-100">
        <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr v-for="(item, index) in $store.getters.getCartItems" :key="index">
                                        <td class="cart_product_img">
                                            <img width="60" :src="item.image" alt="">
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>{{item.name}}</h5>
                                        </td>
                                        <td class="price">
                                            <span>{{item.price}} Taka</span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p class="padding-right">Qty</p>
                                                <div class="quantity">
                                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty > 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="number" class="qty-text qty-style" id="qty" step="1" min="1" max="300" name="quantity" :value="item.buyQty">
                                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <button @click="removeCartItem(slug)" class="btn btn-danger">Remove</button>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>$140.00</span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span>$140.00</span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <router-link class="btn btn-danger" :to="{ name:'checkout-page' }">Go to  Checkout </router-link>
                            </div>
                        </div>
                    </div>
                </div>
    </b-container>    
</template>
<script>
import Axios from'axios'
export default {
    data(){
        return{
            deleteItem:""
        }
    },

    methods:{

    }
}
</script>
<style>
    .padding-right{
        padding-right: 10px;
    }
    .qty-style{
        text-align: center;
        border-radius: 5px;
        border: 2px solid black;
        outline: none;
    }
</style>