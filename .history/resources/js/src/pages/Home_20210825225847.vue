<template>
  <div class="page">
    <b-container-fluid>
      <b-row>
        <b-col md="12">
          <b-carousel
            id="carousel-1"
            v-model="slide"
            :interval="4000"
            controls
            indicators
            background="#ababab"
            image-width="1920"
            img-height="480"
            style="text-shadow: 1px 1px 2px #333"
            @sliding-start="onSlideStart"
            @sliding-end="onSlideEnd"
          >
            <b-carousel-slide
              caption="First slide"
              text="Nulla vitae elit libero, a pharetra augue mollis interdum."
              img-src="https://picsum.photos/1920/480/?image=52"
            ></b-carousel-slide>

            <!-- Slides with custom text -->
            <b-carousel-slide
              img-src="https://picsum.photos/1920/480/?image=54"
            >
              <h1>Hello world!</h1>
            </b-carousel-slide>

            <!-- Slides with image only -->
            <b-carousel-slide
              img-src="https://picsum.photos/1920/480/?image=58"
            ></b-carousel-slide>
          </b-carousel>
        </b-col>
      </b-row>
    </b-container-fluid>
    <b-container>
      <b-section>
        <b-row>
          <b-col>
            <h3 class="p-2 mt-3 bg-dark text-white">Mobile Phones</h3>
          </b-col>
        </b-row>
        <div class="row">
          <div class="col-md-12">
          <div class="alert alert-danger text-center">{{ errorMessage }}</div>

          </div>
        </div>
        <b-row>
          <b-col sm="6" md="3" v-for="(value, index) in products" :key="index">
            <product :product-data="value"></product>
          </b-col>
        </b-row>
      </b-section>
    </b-container>
  </div>
</template>

<script>
import Axios from 'axios';
import Product from "./../components/Product.vue";
export default {
  components: { Product },
  data() {
    return {
      products :[],
      errorMessage: ''
    };
  },
  async beforeMount(){
     const res = await Axios.get("http://127.0.0.1:8000/api/products");
     if(res.data.success){
       this.products = res.data.data;
     }else{
       this.errorMessage = res.data.message
     }
  }
};
</script>