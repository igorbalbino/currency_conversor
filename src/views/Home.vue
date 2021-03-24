<template>
  <v-app class="appHome">
    <NavToolBar />
    <v-container style="padding: 56px 0px 0px;">
      <v-fade-transition mode="out-in">
        <router-view />
      </v-fade-transition>
    </v-container>
  </v-app>
</template>

<script>
import NavToolBar from '../components/NavToolBar.vue'

export default {
  name: 'App',
  components: {
    NavToolBar
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
