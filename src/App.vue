<template>
  <v-app id ="app">
    <Home />
  </v-app>
</template>

<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
<head><script data-ad-client="ca-pub-1849446166424024" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script></head>
<script>
import Home from './views/Home'

export default {
  name: 'App',
  components: {
    Home
  }
}
</script>

<style lang="scss">
#app {
  font-family: Roboto, Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

.paddinToolBar {
  padding: 60px 0px 0px;
}

.paddinGeneral {
  padding: 40px 0px 0px !important;
}

</style>
