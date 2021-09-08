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
      authToken: "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI4IiwianRpIjoiZGI0YzI0NWY2YmFjNTBjODJjMGFkZjI2MmRiZTkyMmYwMDIyNmQ1MzU0ZjdmNDhhMTU1ODRlYTZiY2RjNjI0NTdhOTFiNDAxMTA3ZjNhMGUiLCJpYXQiOjE2MzAxNjk2ODIsIm5iZiI6MTYzMDE2OTY4MiwiZXhwIjoxNjYxNzA1NjgyLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.a40oBM0Ae_N13Cev_G3LFYgkTosmdb3fx2HUpKPvWuL9S-DUuYIHg3isoluR5gqv1-5MebjOCIKgbjxL7SViOTBmzwABMOjJ_5K1qfqSJaCoDaM88nqEM2cOZTD1UwxYnCYBHWabC28k0EMhaOTqkByR6Jf8SM8UrofrhoEn-Gg1Nn7cEkIo6btIVm3tg777SXBWHK711D_OE8w8x_WcHTbZ3DqoYytC4IqRX4tdmAwrhk38RK76lVWfR2C0NuECYY6WfmslcWKe0lBlMFwITpliKNbDvvTIV9lm207IHhrSQWKM0cpM8mwsu8qPCjqMhkCUch1k2yK0Jreqhtswp6HJb7LF-lYCjE1trueR83aCOkyI8zxsVRvlahBC8xmzNcT-AI2_YfQmvnHCYxi2dPUDGT9dGPr0i4ZedxH37ZBj1JvBUjDpkpX0ipx2nXAopWl64RYZTd0-VTX2pWPE5ckjXNbCq8osQ5wlMIIi1dXpU_PIAz96afDrSPRvQxGBv8FowFBhmpjBa9JFdQirHd55z0ZcI84yFpblCvysr1aGj_TxAdhPDSPrQWKTOKlSicT8GuT3Qf-MjeNMGcVavZTyc65aQNYtradZG7YiEUOcJht7Uqm28gqGrOBUb9EuBteLLw_8UawlANHnXVQXLk_MwvzCxlQ9s0X-LgBLWLs"
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
     this.authToken = res.data.auth_token

    //let res = await Axios.get("http://localhost:8000/api/user-details");
    
  },
};
</script>
