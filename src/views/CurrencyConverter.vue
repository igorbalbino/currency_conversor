<template>
  <v-container class="conversor paddinToolBar">
    <div class="currencyFrom">
        <template>
          <h3><span>From:</span></h3>
          <v-select v-for="currency in currencies" :key="currency" label="From"></v-select>
          <!--POSSIBLE SOLUTION
          <select>
            <option value="EUR">EUR</option>
          </select>-->
        </template>
      </div>
      <div class="currencyTo">
        <template>
          <h3><span>To:</span></h3>
          <v-select label="To"></v-select>
          <!--POSSIBLE SOLUTION
          <select>
            <option value="EUR">EUR</option>
          </select>-->
        </template>
      </div>
      <template style="align-text: center;">
        <h3><span>Value:</span></h3>
        <v-text-field placeholder="Value"></v-text-field>
      </template>
    <v-container class="currencyResult">
      <h3><span>Conversion result:</span></h3>
      <h2><span>RESULT</span></h2>
    </v-container>
  </v-container>
</template>

<script>

export default {
  name: 'CurrencyConverter',
  components: {
  },
  props: {
    currencies
  }
}

//DECLARACAO DE VARIAVEIS
var currencies = localStorage.getItem('CURRENCIES');
var url;
var endpoint;
var aux;
//var auxE = '&';
//var key = 'key=6a3aa9c6-0866-4049-ae1f-0098a64d558a';

//DECLARAÇAO DE FUNCOES
function getCurrencyData ()  {
  url = 'http://openexchangerates.org/api/'
  endpoint = 'currencies.json';
  aux = '?show_alternative=1';

  var uri = url + endpoint + aux;

  try{
    fetch(uri, {
       method: 'GET'
    }).then(function (r) {
      return r.json()
    }).then(function(data) {
      localStorage.setItem('CURRENCIES', data)
      return data;
    }).catch(function (e){
      console.log('CurrencyConverter View fetch ERROR:');
      console.log(e);
    }).finally(function(data) {
      return data;
    });
  }catch (e) {
    console.log('CurrencyConverter View try ERROR:2');
    console.log(e);
  }
}
console.log(getCurrencyData());

/*
const convertData = () => {
  endpoint = 'infos/currencies.json';
  var convertFrom_View;
  var convertFrom_Data = 'from=' + convertFrom_View;
  var convertTo_View;
  var convertTo_Data = 'from=' + convertTo_View;
  var amount_View;
  var amount_Data = 'from=' + amount_View;
  var uri = url + aux + convertFrom_Data + auxE + convertTo_Data + auxE + amount_Data + auxE + key;

  fetch(uri).then(function (r) {
    console.log(r);
  }).catch(function (e) {
    console.log('CurrencyConversor View ERROR:');
    console.log(e);
  });
}
*/

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .currencyFrom{
    float: left;
    width: 50%;
  }

  .currencyTo{
    float: left;
    width: 50%;
  }

  .currencyResultArea {
    width: 50%;
    height: 40%;
  }
</style>