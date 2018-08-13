<template>
  <div class='index-page'>
    <h1>ログインページに遷移します</h1>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  mounted(){
    axios.get('/api/login')
    .then(res => {
      console.log(res.data.url);
      location.href = res.data.url;
    })
    .catch(err => console.log(err));
  }
}
</script>

<style scoped>
</style>
