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
            image-width="1280"
            img-height="120"
            style="text-shadow: 1px 1px 2px #333"
            @sliding-start="onSlideStart"
            @sliding-end="onSlideEnd"
          >
            <b-carousel-slide
              caption="First slide"
              text="Nulla vitae elit libero, a pharetra augue mollis interdum."
              img-src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRt3hrl76KfT71R1PbGqpJkqzvUR98U6YLlRuP7IVe7aTBpGB7_3dSiCiDV3QB4OlOjqsE&usqp=CAU"
            ></b-carousel-slide>

            <!-- Slides with custom text -->
            <b-carousel-slide
              img-src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGxTh-o2BjofkP0_1Lx-QpHR9ZNy0jzCtGqg&usqp=CAU"
            >
              <h1>Hello world!</h1>
            </b-carousel-slide>

            <!-- Slides with image only -->
            <b-carousel-slide
              img-src="https://cdn57.androidauthority.net/wp-content/uploads/2020/05/Asus-Zenbook-Pro-Duo-lid-profile.jpg"
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
            <div @mouseout= "hoverOut()"
                @mouseover = "hoverIn()"
                class="animate"
                v-bind:style="{
                  width : boxWidth + '%'
                }"
                >
                <product :product-data="value"></product>
          </div>
          </b-col>
          
        </b-row>
      </b-section>
    </b-container>
  </div>
</template>
<style>
  @import "https://cdn.jsdelivr.net/npm/animate.css@3.5.1";
  .animate{
    transition: all 1s;
  }
</style>
<script>
import Axios from 'axios';
import Product from "./../components/Product.vue";
export default {
  components: { Product },
  data() {
    return {
      products :[],
      errorMessage: '',
      boxWidth: 90
    };
  },
  async beforeMount(){
     const res = await Axios.get("http://127.0.0.1:8000/api/products");
     if(res.data.success){
       this.products = res.data.data;
     }else{
       this.errorMessage = res.data.message
     }
  },
  methods:{
    hoverIn(){
  this.boxWidth = 120
},

hoverOut(){
  this.boxWidth = 90
}
  }

};
</script>