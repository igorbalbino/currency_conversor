<template>
  <v-container class="conversor paddinToolBar">
    <div class="currencyFrom">
        <template>
          <h3><span>From:</span></h3>
          <v-select v-model="viewFrom" :items="currencies" label="From" dense></v-select>
        </template>
      </div>
      <div class="currencyTo">
        <template>
          <h3><span>To:</span></h3>
          <v-select v-model="viewTo" :items="currencies" label="To" dense></v-select>
        </template>
      </div>
      <div class="currencyValue">
        <template>
          <h3><span>Value:</span></h3>
          <v-text-field v-model="viewAmount" placeholder="Value"></v-text-field>
        </template>
      </div>
    <v-container class="currencyResult">
      <h3><span>Conversion result:</span></h3>
      <h2><span>{{ resAmount }}</span></h2>
    </v-container>
  </v-container>
</template>

<script>
//EXPORTA DO VUE E PARA O VUE
export default {
  name: 'CurrencyConverter',
  components: {
  },
  data () {
    return {
      currencies,
      viewFrom, 
      viewTo, 
      viewAmount,
      resAmount
    }
  }
}

//DECLARACAO DE VARIAVEIS
var xhr = new XMLHttpRequest();
var xhrResp = null;
var url;
var endpoint;
var currencies;
var viewFrom, viewTo, viewAmount;
var resAmount;

//DECLARAÇAO DE FUNCOES
/**faz o curl GET da api */
const makeCurlGET = (url, endpoint) => {
  let uri = url + endpoint;

  xhr.open("GET", uri, false);
  xhr.onreadystatechange = function () {
      if (this.readyState === XMLHttpRequest.DONE) {
          if (this.status === 200) {
              //Does not refer to customerArray
              xhrResp = JSON.parse(this.responseText);
          } else {
              console.log(this.status, this.statusText);
          }
      }
  };//onreadystatechange
  xhr.send();
};//makeCurlGET

// const makeCurlConvert = (url, endpoint, params) => {
//   let auxE = '&';
//   let auxI = '?';
//   let values = 'from=' + params[0] + auxE + 'to=' + params[1] + auxE + 'amount=' + auxE + params[2];
//   let uri = url + endpoint + auxI + values;

//   xhr.open("GET", uri, false);
//   xhr.onreadystatechange = function () {
//       if (this.readyState === XMLHttpRequest.DONE) {
//           if (this.status === 200) {
//               //Does not refer to customerArray
//               xhrResp = JSON.parse(this.responseText);
//           } else {
//               console.log(this.status, this.statusText);
//           }
//       }
//   };//onreadystatechange
//   xhr.send();
// };//makeCurlConvert

const cleanner = () => {
  url = null;
  endpoint = null;
  xhrResp = null;
}/*cleaner*/

/**faz curl e retorna as moedas*/
const getCurrencyData = () => {
  url = 'http://openexchangerates.org/api/';
  endpoint = 'currencies.json';

  makeCurlGET(url, endpoint);

  let keys = Object.keys(xhrResp);
  // let data = Object.values(xhrResp);

  currencies = keys;

  cleanner();
};/*getCurrencyData*/ getCurrencyData();

/*
const convertValue = (viewFrom, viewTo, viewAmount) => {
  url = 'http://openexchangerates.org/api/';
  endpoint = 'infos/currencies.json';
  
  let params = [];
  params[0] = viewFrom;
  params[1] = viewTo;
  params[2] = viewAmount;

  makeCurlConvert(url, endpoint, params);

  currencies = xhrResp;
  
  cleanner();
}/*convertValue**)/ convertValue();
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

  .currencyValue{
    width: 50%;
  }

  .currencyResultArea {
    width: 50%;
    height: 40%;
    
  }
</style>