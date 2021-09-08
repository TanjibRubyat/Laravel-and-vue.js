<template>
  <div>
    <router-link
      :to="{ name: 'product-page', params: { slug: productData.slug } }"
    >
      <img
        :src="productData.image"
        style="height: 270px"
        @mouseout="hoverOut()"
        @mouseover="hoverIn()"
        class="animate"
        
      />
      <b-card-text>
        <strong>Name: {{ productData.name }}</strong
        ><br />
        <strong>Price: {{ productData.price }}Taka</strong>
      </b-card-text>
    </router-link>
  </div>
</template>

<script>
export default {
  data(){
    return{
    boxWidth: 70
  }
  },
  
  props: ["productData"],

  methods: {
    hoverIn() {
      this.boxWidth = 100;
    },

    hoverOut() {
      this.boxWidth = 70;
    },
  },
};
</script>

<style>
@import "https://cdn.jsdelivr.net/npm/animate.css@3.5.1";
.animate {
  transition: all 1s;
}
</style>