<template>
  <div id="app">
    <HotelList />
  </div>
</template>


<script>
/*import HelloWorld from './components/HelloWorld.vue'*/
import HotelList from './components/HotelList.vue';

export default {
  name: 'App',
  components: {
    HotelList
  }
}
</script>
<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>