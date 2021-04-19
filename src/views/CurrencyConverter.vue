<template>
  <v-container class="conversor paddinToolBar">
    <div class="currencyFrom">
      <template id="tFrom">
        <h3><span>From:</span></h3>
        <v-select v-model="viewFrom" v-bind:value="viewFrom" :key="viewFrom" :items="currencies" label="From" dense></v-select>
      </template>
    </div>
    <div style="float: left; width: 5%;">
      <template>
        <span><v-icon v-on:click="switchValuesFT">{{ icons.mdiArrowDecision }}</v-icon></span>
      </template>
    </div>
    <div class="currencyTo">
      <template id="tTo">
        <h3><span>To:</span></h3>
        <v-select v-model="viewTo" v-bind:value="viewTo" :key="viewTo" :items="currencies" label="To" dense></v-select>
      </template>
    </div>
    <!-- <FromAndTo viewFrom="viewFrom" viewTo="viewTo"/> -->
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
      <h2>Result:</h2>
      <v-icon :key="resAmount"> {{ resAmount }} </v-icon>
    </v-container>
  </v-container>
</template>

<script>
//IMPORTS
import vue from 'vue'
import VueLodash from 'vue-lodash'
import lodash from 'lodash'
import VueTheMask from 'vue-the-mask'
import {
  mdiArrowDecision,
} from '@mdi/js'
// import VueRouter from 'vue-router'
// import ModalDefault from './components/ModalDefaul.vue'
// import FromAndTo from './components/FromAndTo.vue'
// import GoogleCurrencyAPI from 'backend\Google-Currency-Converter-API-master\sample.php'

//EXPORTA DO VUE E PARA O VUE
export default {
  name: 'CurrencyConverter',
  components: {
    // ModalDefault,
    // FromAndTo
  },
  data () {
    return {
      currencies,
      viewFrom, 
      viewTo, 
      viewAmount,
      resAmount,
      icons: {
        // mdiPencil,
        mdiArrowDecision,
        // mdiShareVariant,
      },
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
    switchValuesFT: () => {
      switchValuesFT()
    },
    // closeModal: () => {
    //   closeModal()
    // }
  },
  // render: function () {
  //   return {
  //     viewFrom, 
  //     viewTo,
  //   }
  // },
  // computed: {
  //   // resAmount,
  //   viewFrom, 
  //   viewTo, 
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
vue.use(VueLodash, { name: 'ldsVue' , lodash: lodash });

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
var resAmount = 0;
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
};/*cleaner*/

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
      resAmount = String(vue.ldsVue.clone(xhrResp.result));

    }
  } else {
    if (xhrResp.result == null || xhrResp.result == undefined || xhrResp.result == [] || xhrResp.result == '') {
      resAmount = 'Error!';
    } else {
      resAmount = null;
      resAmount = String(vue.ldsVue.clone(xhrResp.result));
    }
  }
  console.log(resAmount);
  cleanner();
};/*convertValue*/

/**TROCA OS VALORES DE FROM e TO */
const switchValuesFT = () => {
  if (!((viewFrom == null || viewFrom == undefined) 
  && (viewTo == null || viewTo == undefined))) {
    let aux = vue.ldsVue.clone(viewFrom);
    let aux2 = vue.ldsVue.clone(viewTo);
    console.log(aux);
    viewFrom, viewTo = null;
    viewFrom = aux2;
    viewTo = aux;
    console.log('trocado');
    console.log(viewFrom);
    console.log(viewTo);
  } else {
    console.log('não trocado');
  }
};/**switchValuesFT */


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
    /* width: 50%; */
    width: 48%;
    margin-right: 2%;
  }

  .currencyTo{
    float: left;
    /* width: 50%; */
    width: 48%;
    margin-left: 2%;
  }

  .currencyValue{
    /* width: 50%; */
    width: 48%;
    margin-left: 25%;
  }

  .currencyResultArea {
    /* width: 50%; */
    width: 48%;
    height: 40%;
    
  }
</style>