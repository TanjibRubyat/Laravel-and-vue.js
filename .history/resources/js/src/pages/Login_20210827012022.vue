<template>
<div class="content-center padding-left-right">
    <form action="">
        <input class="form-control width padding-left-right" type="email" v-model="loginEmail" placeholder="Email">
        <input class="form-control width padding-left-right" type="password" v-model="password" placeholder="Password">
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
        padding-left: 40%;
    }

    .width{
        width: 50%;
    }

    .padding-left-right{
        padding-top:100px;
        padding-bottom:100px;
    }
</style>