<template>
    <h1>Category Product Page</h1>


</template>

<script>
import Axios from 'axios'
export default {
    data(){
        return{
            products:""
        }
    },
    async beforMount(){
        let res = await Axios.get("http://127.0.0.1:8000/category/id")
        this.products = res.data.data
    }

    }
</script>