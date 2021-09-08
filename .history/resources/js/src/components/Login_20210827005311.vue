<template>
    <form action="">
        <input class="form-control" type="email" v-model="loginEmail" placeholder="Email">
        <input class="form-control" type="password" v-model="password" placeholder="Password">
        <button>Login</button>
    </form>
</template>
<script>
export default {
    data:{
        return(){
            loginEmail:"";
            password : ""
        }
    }
}
</script>