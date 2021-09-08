<template>
  <div class="content-center">
    <h1>Dashboard my account</h1>
    <p v-for="(data,index) in userData" :key="index">
        {{data}}
    </p>
  </div>
</template>
<script>
import Axios from "axios";
export default {
  data: {
    return() {
      userData: "";
      authToken: "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI4IiwianRpIjoiN2JjOTFhMGI0ZDIyNTlhYzk0Njc5NDk1YjY4YzRkM2Q0NDIwYmY5ZjIwYzEwMDNmM2I5ODNlODBhNmM5YmM4ZWEwZjZkNjhhOTU5ODQyMDYiLCJpYXQiOjE2MzAxMjU2NzksIm5iZiI6MTYzMDEyNTY3OSwiZXhwIjoxNjYxNjYxNjc5LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.tba00e0OB9fKLKyAw2HKhK7bizR2aFBB4J_tGwkHk8P59BCoppoSKyisViKmQOvqwRLo9zoPrS9CzorXamgH9SCIe4Mg4gcVOF4m38jmgz1aUvPK3pgj290tQZ3fg_eo8ddDGziM7ef8jpGydt2W3ihfx2hZ6qUayfKw895-GXQPkSSLG2FHegXjfq6MffyYpPApH2N5FUCtN1BFKJE-T7na9IjqY-EYAvOlAMuWTHn71AmgfGRv7VCsa7lDwVJ7lS5LusIcZQr7tArB_J3Knk8NdONLRxYCMeXQEVr3zJU1oN0b3kOHplm7N2viE4Ttsc4Mpm7op96X8NYn8_IvS4mg4lBrWopeE9jAAXB5gkuXMwkVB5L-UPY54MbsZLbu9Egby3jdJA4VLYT3PRoltMqMbO9zcwFLkfC5kB1HBC41nA7Kmc7SHWjH8Y7_laFnieASgqinnLsDMqx0SKLmuVrw2Oi-AFNy_R2ovtCwStOf-T-RuFksiWv6rFqgddZgnrreRkYEFkrFVrBE1xnvvB4SWSTvttBOjKiXJL1M742Fm88CScSZCGdIP6AMHFvhE3AKJ0pTRja2K9mfEmMET_b2DgBcV1RRO2Nd-Kke4E_w9D_cnipuNMl83LMYPDFZ48cd1oMFoteJtLI6FKJUecTDhYfa3Dv4oTJsGO9KT9M"
    },
  },
  async beforeMount() {
    let res = await axios.get("http://localhost:8000/api/user-details", {
      headers: {
        Authorization: "Bearer " + this.authToken, 
        Accept: 'application/json'
      },
       
    });
     this.userData = res.data;
    //let res = await Axios.get("http://localhost:8000/api/user-details");
    
  },
};
</script>
