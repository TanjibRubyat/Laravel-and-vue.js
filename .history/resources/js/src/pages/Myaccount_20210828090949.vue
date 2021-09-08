<template>
  <div class="content-center">
      <h1>Dashboard my account</h1>
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
   
   methods:{
       async submit(){
        let logData={
            email:this.loginEmail,
            password:this.password            
        }

        let res = await Axios.post('http://127.0.0.1:8000/api/user-login',logData)
        if(res.data.success){
                this.$router.push({ name:"login-page" });
            }else{
                // res.data.message;
                console.log(res.data.message)
            }
    },
   }
    
}
</script>
<style>
.content-center {
  align-items: center;
  justify-content: center;
  padding-left: 35%;
}

.width {
  width: 40%;
}

.padding-top-bottom {
  padding-top: 17%;
  padding-bottom: 40%;
}
</style>