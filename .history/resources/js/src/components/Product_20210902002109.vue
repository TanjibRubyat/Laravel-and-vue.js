<template>
  <div>
    <router-link
      :to="{ name: 'product-page', params: { slug: productData.slug } }"
    >

        <img :src="productData.image" style="height:270px">
        <b-card-text>
          <strong>Name: {{productData.name}}</strong>
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