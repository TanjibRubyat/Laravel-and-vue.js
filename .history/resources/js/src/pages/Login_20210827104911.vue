<template>
<div class="content-center">
    <form action="" class=" padding-top-bottom">
        <input class="form-control width" type="email" v-model="loginEmail" placeholder="Email"><br>
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
            password : ""
        }
    },
    
    submit(){
        let logData={
            let res = await Axios.post('http://127.0.0.1:8000/api/user-login')
        let details = res.data.data
            email:this.loginEmail,
            password:this.password

            
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