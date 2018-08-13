<template>
  <div class='index-page'>
    <h1>this is token!!!</h1>
    <h1>{{ token }}</h1>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      token: null,
    }
  },
  mounted(){
    axios.get('/api/login/callback', {params: this.$route.query})
    .then(res => {
      console.log(res.data.token);
      this.token = res.data.token;
    })
    .catch(err => console.log(err));
  }
}
</script>

<style scoped>
</style>
