<template>
  <div class="content-center">
    <h1>Dashboard</h1>
    <div class="name">
      <p>
        Name: {{ userData.name }}
      </p>
      <p>Email: {{userData.email}}</p>
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
    padding: 300px auto;
  }
</style>