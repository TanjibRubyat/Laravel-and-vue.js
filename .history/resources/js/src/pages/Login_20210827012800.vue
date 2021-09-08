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
export default {
    data:{
        return(){
            loginEmail:"";
            password : ""
        }
    },

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
        padding-top: 20%;
        padding-bottom: 40%;
    }
</style>