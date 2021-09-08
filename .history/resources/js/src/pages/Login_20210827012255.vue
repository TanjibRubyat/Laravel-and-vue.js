<template>
<div class="content-center">
    <form action="" class=" padding-left-right">
        <input class="form-control width pb-4" type="email" v-model="loginEmail" placeholder="Email">
        <input class="form-control width pb-4" type="password" v-model="password" placeholder="Password">
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
</style>