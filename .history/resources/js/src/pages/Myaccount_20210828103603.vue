<template>
  <div class="content-center">
      <h1>Dashboard my account</h1>
  </div>
</template>
<script>
import Axios from 'axios'
export default {
    
   async beforeMount(){
       let res = await Axios.get("http://localhost:8000/api/user-details")
   }
    
}
</script>
