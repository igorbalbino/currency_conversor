<template>
  <div class="navToolBar">
    <v-app-bar color="white" elevate-on-scroll id="app-toolbar" fixed>
      <h2 style="padding: 5px; color: #128C51;">Currency Conversor</h2>
      <router-link tag="span" class="alignMiddle" to="/Home"><v-btn text>Home</v-btn></router-link>
      <router-link tag="span" class="alignMiddle" to="/CurrencyConverter" ><v-btn text>Conversor</v-btn></router-link>
      <!--<router-link tag="span" class="alignMiddle" to="/views/CurrencyLive" exact><v-btn text>Cotação da Moeda</v-btn></router-link>-->
      <router-link tag="span" class="alignMiddle" to="/CurrencyHistory"><v-btn text>Histórico da Moeda</v-btn></router-link>
    </v-app-bar>
  </div>
</template>

<!--router-->
<script src="../router/index.js"></script>
<script>
export default {
  components: {
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  #app-toolbar .v-toolbar__items .v-btn {
    text-transform: capitalize;
    font-size: 16px;
    font-weight: 300;
  }
  
  a {
    text-decoration: none;
  }

  .alignMiddle {
    align-items: center;
    display: flex;
  }
</style>