<template>
  <div class="home_page">
    <div><NavToolBar /></div>
    <div><CurrencyConversor /></div>
  </div>
</template>

<script>
import NavToolBar from './NavToolBar.vue'
import CurrencyConversor from './CurrencyConversor.vue'

export default {
  name: 'App',
  components: {
    NavToolBar,
    CurrencyConversor
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
