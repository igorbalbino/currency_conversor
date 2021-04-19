<template>
  <v-container class="conversor paddinToolBar">
    <div class="currencyFrom">
      <template id="tFrom">
        <h3><span>From:</span></h3>
        <v-select v-model="viewFrom" v-bind:value="viewFrom" :items="currencies" label="From" dense></v-select>
      </template>
    </div>
    <template>
      <v-icon role="switch"></v-icon>
    </template>
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
          v-model="viewAmount" v-bind:value="viewAmount"
          placeholder="Amount" 
          v-mask="['#,##', '##,##','###,##','####,##','#####,##','######,##', '#######,##',
          '########,##','#########,##','##########,##', '###########,##',
          '############,##','#############,##','##############,##','###############,##']" 
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
      <!-- <h2><span>Result:</span></h2> -->
      <h2>Result:</h2>
      <h2 v-if="resAmount"> {{ resAmount }} </h2>
      <!-- <p><span>{{ resAmount }}</span></p> -->
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
  // created () {
  //   getCurrencyData()
  // },
  // mounted () {
  //   getCurrencyData()
  // },
  methods: {
    isValidF: (v) => {
      validateData(v)
    },
    // closeModal: () => {
    //   closeModal()
    // }
  },
  render: (resAmount) => {
    return resAmount
  },
  // render: () => {
  //   return {
  //     resAmount
  //   }
  // },
  // computed: {
  //   resAmount,
  // },
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
// var arrSelectedOps;
// var isModalVisible                        = false; 

//DECLARAÇAO DE FUNCOES
/**faz o curl da api */
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
    console.log('makeCurl error');
    console.log(e);
  }
};//makeCurl

const cleanner = () => {
  url         = null;
  endpoint    = null;
  xhrResp     = null;
  method      = null;
}/*cleaner*/

const validateData = (v) => {
  if(v != null) {
    let dataString = String(v);
    dataString = dataString.replace(',', '.');
    dataString = parseFloat(dataString);
    viewAmount = dataString;
    dataString        = null;
    v                 = null;
    resAmount         = null;

    if (viewFrom == null || viewFrom == undefined) {
      console.log('FROM não selecionado.');
    }
    if (viewTo == null || viewFrom == undefined) {
      console.log('TO não selecionado.');
    }
    if (viewAmount == null || viewAmount == undefined) {
      console.log('VALOR vazio.');
    }

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

  if (currencies == null || currencies == undefined || currencies == [] || currencies == '') {
    currencies = keys;
  } else {
    console.log('Lista de moedas já cheia.');
  }

  cleanner();
};/*getCurrencyData*/ getCurrencyData();

const convertValue = (viewFrom, viewTo, viewAmount) => {
  // url               = 'http://data.fixer.io/api/';
  url               = 'https://api.exchangerate.host/';
  method            = 'GET';

  // endpoint = 'convert' + auxI  + data_fixerKey + auxE + viewFrom + auxE + viewTo + auxE+ viewAmount;/**data.fixer */
  endpoint = 'convert' + auxI  + 'from=' + viewFrom + auxE + 'to=' + viewTo + auxE + 'amount=' + viewAmount; /**exchangerate.host */

  makeCurl(url, endpoint, method);

  if (resAmount == null || resAmount == undefined || resAmount == [] || resAmount == '') {
    if (xhrResp.result == null || xhrResp.result == undefined || xhrResp.result == [] || xhrResp.result == '') {
      resAmount = 'Error!';
    } else {
      resAmount = xhrResp.result;
    }
  } else {
    if (xhrResp.result == null || xhrResp.result == undefined || xhrResp.result == [] || xhrResp.result == '') {
      resAmount = 'Error!';
    } else {
      resAmount = null;
      resAmount = xhrResp.result;
    }
  }
  
  cleanner();
}/*convertValue*/


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