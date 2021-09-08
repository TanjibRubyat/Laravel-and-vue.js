<template>
<div class="content-center">
    <form action="" class=" padding-top-bottom">
        <input class="form-control width" type="email" v-model="loginEmail" placeholder="Email"><br>
        <input class="form-control width" type="name" v-model="loginName" placeholder="Name"><br>
        <input class="form-control width" type="password" v-model="password" placeholder="Password"><br>
        <button>Login</button>
    </form>
    </div>
</template>
<script>
import Axios from 'axios'
export default {
    data:{
        return(){
            loginEmail:"";
            loginName:""
            password : ""
        }
    },

    async beforeMount(){
        let res = await Axios.get('http://127.0.0.1:8000/api/user-details')
        let details = res.data.data
        console.log(details)
    },
    methods:{
        loginData(){

        }
    }
}
</script>
<style>
    .content-center{
        align-items: center;
        justify-content: center;
        padding-left: 35%;
    }

    .width{
        width: 40%;
    }

    .padding-top-bottom{
        padding-top: 17%;
        padding-bottom: 40%;
    }
</style>