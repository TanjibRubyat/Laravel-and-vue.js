<template>
  <div class="content-center">
    <h1>Dashboard my account</h1>
    <p>
        {{userData.name}}
    </p>
  </div>
</template>
<script>
import Axios from "axios";
import $api from "./api"
export default {
  data() {
    return {
      userData: "",
      authToken: ""
    }
  },
  async beforeMount() {
    let res = await $api.get("/user-details", {
      headers: {
        Authorization: "Bearer " + this.authToken, 
        Accept: 'application/json'
      },
       
    });
     this.userData = res.data;
     
     let token = await $api.get("/user-login")
      localStorage.setItem('token', token.data); 
    
    
  },
};
</script>
