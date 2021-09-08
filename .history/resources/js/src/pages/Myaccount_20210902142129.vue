<template>
  <div class="content-center">
    <h1>Dashboard my account</h1>
    <div class="name">
      <p>
        {{ userData.name }}
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
  .name{
    font-family: sans-serif;
    font-weight:bold;
    margin-left: 30px;
  }
</style>