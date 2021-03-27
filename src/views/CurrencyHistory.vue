<template>
  <v-container class="conversor paddinToolBar">
    <div class="currency">
        <template>
          <h3><span>Currency:</span></h3>
          <v-select>
            <option value=""></option>
          </v-select>
        </template>
      </div>
    <v-container class="currencyHistory">
      <h3><span>Currency history:</span></h3>
      <v-progress-linear></v-progress-linear>
    </v-container>
  </v-container>
</template>

<script>

export default {
  name: 'CurrencyHistory',
  components: {
  }
}
  /*
  var arr;
  var url = 'http://api.currencylayer.com/';
  var endpoint;
  var aux = '?';
  var auxE = '&';
  var key = 'key=26c69564c33688772b250c1e505db841';

  const convertData = () => {
    endpoint = 'convert';
    var convertFrom_View;
    var convertFrom_Data = 'from=' + convertFrom_View;
    var convertTo_View;
    var convertTo_Data = 'from=' + convertTo_View;
    var amount_View;
    var amount_Data = 'from=' + amount_View;
    var uri = url + aux + convertFrom_Data + auxE + convertTo_Data + auxE + amount_Data + auxE + key;

    fetch(uri).then(response) {

    }.catch(e) {
      console.log('CurrencyConversor View ERROR:');
      console.log(e);
    }
  }
  */

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .currency{
    width: 100%;
  }

  .currencyResultArea {
    width: 50%;
    height: 40%;
  }
</style>