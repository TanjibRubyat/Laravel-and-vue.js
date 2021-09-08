<template>
  <div>
    <router-link
      :to="{ name: 'product-page', params: { slug: productData.slug } }"
    >
      <b-card
        :title="productData.name"
        img-src="https://picsum.photos/600/300/?image=25"
        img-alt="Image"
        img-top
        tag="article"
        style="max-width: 20rem"
        class="mb-2"
      >
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