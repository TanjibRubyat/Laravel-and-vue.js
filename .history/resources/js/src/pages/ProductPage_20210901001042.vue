<template>
  <div class="page">
    <b-container>
      <b-row>
        <b-col sm="6" class="p-5">
          <b-card><img :src="productShow.image" alt=""></b-card>
		  <b-row>
			  <b-col sm="4" v-for="(gImg, index) in productShow.gallery" :key="index">
				  <b-card><img :src="gImg" alt=""></b-card>
			  </b-col>
		  </b-row>
        </b-col>
        <b-col sm="6" class="p-5">
          <h3>{{productShow.name}}</h3>
          <h4>{{productShow.price}}</h4>
          <p>{{productShow.description}} </p>
          <div>
            <input type="number" v-model.number="checkoutQuantity">

            <button class="btn btn-danger" @click="addToCart">Add To Cart</button>
          </div>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
import Axios from 'axios';
export default {
  data(){
    return {
      productShow: {},
      checkoutQuantity: 0
    }
  },
  methods:{
   addToCart (){
        let cartItem = {
          name: this.productShow.name,
          slug: this.productShow.slug,
          buyQty: this.checkoutQuantity,
          price: this.productShow.price,
          product_id: this.productShow.id
        }

         this.$store.dispatch('addCartItem', cartItem);
    }
  },
  async beforeMount(){
     const res = await Axios.get("http://127.0.0.1:8000/api/product-by-slug/"+this.$route.params.slug);
    this.productShow = res.data.data;
  }
}
</script>
<style>
  .text-align{
    text-align: center;
  }
</style>