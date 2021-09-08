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
export default {
  data() {
    return {
      userData: "",
      authToken: ""
    }
  },
  async beforeMount() {
    let res = await Axios.get("http://localhost:8000/api/user-details", {
      headers: {
        Authorization: "Bearer " + this.authToken, 
        Accept: 'application/json'
      },
       
    });
    this.userData = res.data;
    let token = await Axios.get("http://localhost:8000/api/user-details")
     
     this.authToken = token.data.auth_token

    //let res = await Axios.get("http://localhost:8000/api/user-details");
    
  },
};
</script>
