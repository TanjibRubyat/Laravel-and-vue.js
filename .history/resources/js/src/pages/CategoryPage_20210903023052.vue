<template>
<div class="categorytitle">
    <h1 >Category Product Page</h1>
    <div v-for="(product,index) in products" :key="index">
        <p>{{product.name}}</p>
    </div>
    </div>
</template>

<script>
import Axios from 'axios'
export default {
    data(){
        return{
            products:""
        }
    },
    async beforeMount(){
        let res = await Axios.get("http://127.0.0.1:8000/api/products-by-category-id/"+this.$route.params.id)
        this.products = res.data.data
    }

    }
</script>
<style>
   h1 .categorytitle{
        padding-left: 300px;
        
    }
</style>