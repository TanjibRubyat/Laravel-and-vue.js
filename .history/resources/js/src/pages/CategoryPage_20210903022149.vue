<template>
<div>
    <h1 class="categorytitle">Category Product Page</h1>
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
    .categorytitle{
        justify-content: center;
        position: relative;
        left: 40%;
    }
</style>