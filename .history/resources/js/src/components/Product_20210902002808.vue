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
        v-bind:style="{
          width: boxWidth + '%',
        }"
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
  props: ["productData"],

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
@import "https://cdn.jsdelivr.net/npm/animate.css@3.5.1";
.animate {
  transition: all 1s;
}
</style>