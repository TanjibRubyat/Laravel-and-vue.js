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
              img-src="https://resize.indiatvnews.com/en/resize/newbucket/715_-/2021/04/oppo-a74-5g-1618560030.jpg"
            ></b-carousel-slide>

            <!-- Slides with custom text -->
            <b-carousel-slide
              img-src="https://i.gadgets360cdn.com/products/large/asus-vivobook15-x509-1287x800-1567590182.jpg"
            >
              <h1>Hello world!</h1>
            </b-carousel-slide>

            <!-- Slides with image only -->
            <b-carousel-slide
              img-src="data:image/jpeg;base64,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"
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