<template>
  <div>
    <router-link
      :to="{ name: 'product-page', params: { slug: productData.slug } }"
    >

        <img :src="productData.image" style="height:200px">
        
        <b-card-text>
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