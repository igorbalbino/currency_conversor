<template>
  <v-container class="conversor paddinToolBar">
    <div class="currencyFrom">
      <template id="tFrom">
        <h3><span>From:</span></h3>
        <v-select v-model="viewFrom" v-bind:value="viewFrom" :items="currencies" label="From" dense></v-select>
      </template>
    </div>
    <div class="currencyTo">
      <template id="tTo">
        <h3><span>To:</span></h3>
        <v-select v-model="viewTo" v-bind:value="viewTo" :items="currencies" label="To" dense></v-select>
      </template>
    </div>
    <div class="currencyValue">
      <template  id="tValue">
        <h3><span>Value:</span></h3>
        <v-text-field class="centered-input" 
          v-model="viewAmount" placeholder="Amount" 
          v-mask="['##,##','###,##','#.###,##','##.###,##','###.###,##', '#.###.###,##',
          '##.###.###,##','###.###.###,##','#.###.###.###,##', '##.###.###.###,##',
          '###.###.###.###,##','#.###.###.###.###,##','##.###.###.###.###,##','###.###.###.###.###,##',
          '#.###.###.###.###.###,##','##.###.###.###.###.###,##', '###.###.###.###.###.###,##']" 
          justify-center outlined
          v-on:change="isValidF">
        </v-text-field>
        <!-- <ModalDefault
          v-show="isModalVisible"
          @close="closeModal"
        /> -->
      </template>
    </div>
    <v-container class="currencyResult">
      <h3><span>Result:</span></h3>
      <h2><span>{{ resAmount }}</span></h2>
    </v-container>
  </v-container>
</template>

<script>
//IMPORTS
import vue from 'vue'
import VueTheMask from 'vue-the-mask'
// import ModalDefault from './components/ModalDefaul.vue'
// import GoogleCurrencyAPI from 'backend\Google-Currency-Converter-API-master\sample.php'

//EXPORTA DO VUE E PARA O VUE
export default {
  name: 'CurrencyConverter',
  components: {
    // ModalDefault
  },
  data () {
    return {
      currencies,
      viewFrom, 
      viewTo, 
      viewAmount,
      resAmount,
      // isModalVisible
    }
  },
  methods: {
    isValidF: (viewAmount) => {
      // ...
      validateData(viewAmount)
    },
    // closeModal: () => {
    //   closeModal()
    // }
  },
  watch: {
    'viewFrom': (data) => { 
      viewFrom = data;
    },
    'viewTo': (data) => { 
      viewTo = data;
    }
  }
}

//VUE
vue.use(VueTheMask);

//DECLARACAO DE VARIAVEIS
const xhr                                 = new XMLHttpRequest();
const auxE                                = '&';
const auxI                                = '?';
// const auxB                                = '/';
// const openExchangeRatesKey                = 'app_id=4e4d6fb2c3414ff3bed2e3b5a5d87c97';
// const openExchangeRatesKeyV2              = 'app_id=d239241aecd54f6c9e9008225a2d9bf6';
// const data_fixerKey                       = 'access_key=0be03d3c98fb23fd753ad6dcedea4067';
var xhrResp                               = null;
var url                                   = null;
var endpoint                              = null;
var method                                = null;
var currencies;
var viewFrom, viewTo, viewAmount;
var resAmount;
// var isModalVisible                        = false; 

//DECLARAÇAO DE FUNCOES
/**faz o curl GET da api */
const makeCurl = (url, endpoint, method) => {
  let uri = url + endpoint;

  try {
    xhr.open(method, uri, false);
    xhr.onreadystatechange = function () {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200) {
                //Does not refer to customerArray
                xhrResp = JSON.parse(this.responseText);
            } else {
                console.log('onreadystatechange error!');
                console.log(this.status, this.statusText);
            }
        }
    };//onreadystatechange
    xhr.send();
  } catch (e) {
    console.log('makeCurlGET error');
    console.log(e);
  }
};//makeCurlGET

const cleanner = () => {
  url         = null;
  endpoint    = null;
  xhrResp     = null;
  viewFrom    = null;
  viewTo      = null;
  viewAmount  = null;
  method      = null;
  console.log('cleanner');
}/*cleaner*/

const validateData = (viewAmount) => {
  if(viewAmount != null) {
    let dataString = String(viewAmount);

    dataString = dataString.replace('.', '');
    dataString = dataString.replace(',', '.');
    dataString = parseFloat(dataString);
    viewAmount = dataString;

    dataString = null;

    convertValue(viewFrom, viewTo, viewAmount);
  }/**if */
};/**validateData */

/**faz curl e retorna as moedas*/
const getCurrencyData = () => {
  url = 'http://openexchangerates.org/api/';
  endpoint = 'currencies.json';
  method = 'GET';


  makeCurl(url, endpoint, method);

  let keys = Object.keys(xhrResp);
  // let values = Object.values(xhrResp);

  if (currencies) {
    console.log('Lista de moedas já cheia.');
  } else {
    currencies = keys;
  }

  cleanner();
};/*getCurrencyData*/ getCurrencyData();

const convertValue = (viewFrom, viewTo, viewAmount) => {
  // url = 'https://api.exchangerate.host/';
  // url = 'http://data.fixer.io/api/';
  url = 'https://api.exchangerate.host/';
  method = 'GET';

  trataCurlData();

  // endpoint = 'convert' + auxI  + data_fixerKey + auxE + viewFrom + auxE + viewTo + auxE+ viewAmount;
  endpoint = 'convert' + auxI  + viewFrom + auxE + viewTo + auxE+ viewAmount;

  makeCurl(url, endpoint, method);

  if (resAmount) {
    resAmount = null;
    resAmount = xhrResp.result;
  } else {
    resAmount = xhrResp;
  }

  console.log('resAmount');
  console.log(resAmount);
  console.log('xhrResp');
  console.log(xhrResp);
  
  cleanner();
}/*convertValue*/

const trataCurlData = () => {
  viewFrom    = 'from=' + viewFrom;
  viewTo      = 'to=' + viewTo;
  viewAmount  = 'amount=' + viewAmount;
}/*trataCurlData*/


/** ///////////////////// */
// const showModal = () => {
//   isModalVisible = true;
// }

// const closeModal = () => {
//   isModalVisible = false;
// }

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