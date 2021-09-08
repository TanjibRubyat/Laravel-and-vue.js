<template>
  <div class="align-myaccount background" style="align-content: center">
    <h1 class="pt-4 dashboard" >Dashboard</h1>
    <hr>
    <div class="name">
      <p>
        <strong>Name: </strong> <span>{{ userData.name }}</span>
      </p>
      <p>
        <strong>Email: </strong> <span>{{ userData.email }}</span>
      </p>
    </div>
  </div>
</template>
<script>
import Axios from "axios";
import $api from "./api";
export default {
  data() {
    return {
      userData: "",
    };
  },
  async beforeMount() {
    let res = await this.$store.dispatch("loadUserDetails");
    this.userData = res.data;

    //let token = await $api.get("/user-login")
  },
};
</script>
<style>
.name p strong{
  font-family: sans-serif;
  font-weight: bold;
  font-size: 2rem;
  margin: 0 30px;
  /* padding-top: 400px; */
}

.name{
  padding-top: 80px;
  position: relative;
  left: 36%;
}

.align-myaccount .name span {
  color: #000000db;
  font-size: 2rem;
  font-weight: 600;
  
}

.background{
  background-color: rgb(19 20 20 / 11%);
  height: 400$;
}

.align-myaccount{
  width: 100%;
  padding-left: 2px;
  align-content: center;
  align-items: center;
  justify-content: center;
}

.dashboard{
  align-content: center;
  align-items: center;
  justify-content: center;
  position: relative;
  left: 43%;
}
</style>