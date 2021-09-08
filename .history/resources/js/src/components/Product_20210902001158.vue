<template>
  <div>
    <router-link
      :to="{ name: 'product-page', params: { slug: productData.slug } }"
    >

        <img :src="productData.image">
        
        <b-card-text>
          <strong>Price: {{ productData.price }}Taka</strong>
        </b-card-text>
      </b-card>
    </router-link>
  </div>
</template>

<script>
export default {
  props: ["productData"],
};
</script>