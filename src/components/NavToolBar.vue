<template>
  <div class="navToolBar">
    <v-app-bar color="white" elevate-on-scroll id="app-toolbar" fixed>
      <router-link tag="span" class="alignMiddle" to="/views/Home" exact><v-btn text>Home</v-btn></router-link>
      <router-link tag="span" class="alignMiddle" to="/CurrencyConversor" ><v-btn text>Conversor</v-btn></router-link>
      <!--<router-link tag="span" class="alignMiddle" to="/components/CurrencyLive" exact><v-btn text>Cotação da Moeda</v-btn></router-link>
      <router-link tag="span" class="alignMiddle" to="/components/CurrencyHistory" exact><v-btn text>Histórico da Moeda</v-btn></router-link>-->
    </v-app-bar>
  </div>
</template>

<script>
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  #app-toolbar .v-toolbar__items .v-btn {
    text-transform: capitalize;
    font-size: 16px;
    font-weight: 300;
  }

  .alignMiddle {
    align-items: center;
    display: flex;
  }
</style>