<template>
  <div>
    <router-link
      :to="{ name: 'product-page', params: { slug: productData.slug } }"
    >

        <img :src="productData.image" style="height:270px"  @mouseout= "hoverOut()"
                @mouseover = "hoverIn()"
                class="animate"
                v-bind:style="{
                  width : boxWidth + '%'
                }">
        <b-card-text>
          <strong>Name: {{productData.name}}</strong><br>
          <strong>Price: {{ productData.price }}Taka</strong>
        </b-card-text>
    </router-link>
  </div>
</template>

<script>
export default {
  props: ["productData"],
};
</script>