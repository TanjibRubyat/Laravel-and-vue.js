<template>
<div>
    <form action="">
        <input class="form-control content-center width" type="email" v-model="loginEmail" placeholder="Email">
        <input class="form-control content-center width" type="password" v-model="password" placeholder="Password">
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
    }

    .width{
        width: 100px;
    }
</style>