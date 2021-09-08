<template>
  <div class="content-center" style="align-content:center">
    <h1 class="pt-4">Dashboard</h1>
    <div class="jumbotron">
    <div class="name">
      <p>
        <strong>Name:   </strong>   <span>{{ userData.name }}</span>
      </p>
      <p><strong>Email:   </strong>   <span>{{userData.email}}</span>
      </p>
    </div>
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
  .name{
    font-family: sans-serif;
    font-weight:bold;
    margin: 0 30px;
    padding-top: 100px;
  }

  span{
    color: turquoise;
    font-weight: 600;
  }
</style>