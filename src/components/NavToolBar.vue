<template>
  <div class="navToolBar">
    <nav class="toolBar">
        <ul>
            <li><a @click="Home" href="#"><span>Página Inicial</span></a></li>
            <li><a @click="CurrencyConversor" href="#"><span>Conversor</span></a></li>
            <li><a class='opPagLive' href="#"><span>Cotação atual da Moeda</span></a></li>
            <li><a class='opPagHistorico' href="#"><span>Histórico da Moeda</span></a></li>
        </ul>
    </nav>
  </div>
</template>

<script>
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .toolBar {
  }
</style>