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
              img-src="https://cc.cnetcontent.com/inlinecontent/mediaserver/all/594/1a1/5941a10978fbe9dd78b66fdfaf1afede/original.png"
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
        <div class="container">
          <div class="row">
              <div
                v-for="(product, index) in products"
                :key="index"
                class="card pr-1"
                style="width: 300px"
              >
                <div class="">
                  <img
                    :src="product.image"
                    class="card-img-top products"
                    alt="..."
                  />
                  <div class="card-body">
                    <h5 class="card-title">{{ product.name }}</h5>
                    <p class="card-text">
                      {{product.description}}
                    </p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </b-section>
    </b-container>
  </div>
</template>
<style>
@import "https://cdn.jsdelivr.net/npm/animate.css@3.5.1";
.animate {
  transition: all 1s;
}
</style>
<script>
import Axios from "axios";
import Product from "./../components/Product.vue";
export default {
  components: { Product },
  data() {
    return {
      products: [],
      errorMessage: "",
      boxWidth: 90,
    };
  },
  async beforeMount() {
    const res = await Axios.get("http://127.0.0.1:8000/api/products");
    if (res.data.success) {
      this.products = res.data.data;
    } else {
      this.errorMessage = res.data.message;
    }
  },
  methods: {
    hoverIn() {
      this.boxWidth = 120;
    },

    hoverOut() {
      this.boxWidth = 90;
    },
  },
};
</script>

<style>
.products {
  height: 18rem;
}

.padding {
  padding-right: 100px;
}
</style>