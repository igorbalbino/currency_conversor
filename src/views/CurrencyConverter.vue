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
          v-mask="['#,##', '##,##','###,##','#.###,##','##.###,##','###.###,##', '#.###.###,##',
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
      <!-- <h2><span>Result:</span></h2> -->
      <h2>Result:</h2>
      <p v-bind="resAmount"><span>{{ resAmount }}</span></p>
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
  created () {
    getCurrencyData()
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
// var arrSelectedOps;
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
    console.log('makeCurl error');
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
}/*cleaner*/

const validateData = (viewAmount) => {
  if(viewAmount != null) {
    let dataString = String(viewAmount);

    dataString = dataString.replace('.', '');
    dataString = dataString.replace(',', '.');
    dataString = parseFloat(dataString);
    viewAmount = dataString;

    dataString = null;

    if (viewFrom == null || viewFrom == undefined) {
      console.log('Selecione o valor de FROM novamente.');
      alert('Selecione o valor de FROM novamente.');
    }
    if (viewTo == null || viewFrom == undefined) {
      console.log('Selecione o valor de TO novamente.');
      alert('Selecione o valor de TO novamente.');
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
  resAmount         = null;

  // endpoint = 'convert' + auxI  + data_fixerKey + auxE + viewFrom + auxE + viewTo + auxE+ viewAmount;/**data.fixer */
  endpoint = 'convert' + auxI  + 'from=' + viewFrom + auxE + 'to=' + viewTo + auxE + 'a=' + viewAmount; /**exchangerate.host */

  makeCurl(url, endpoint, method);

  if (resAmount == null || resAmount == undefined || resAmount == [] || resAmount == '') {
    if (xhrResp.result == null || xhrResp.result == undefined || xhrResp.result == [] || xhrResp.result == '') {
      resAmount = 'Error!';
    } else {
      resAmount = xhrResp.result;
      console.log(resAmount);
    }
  } else {
    if (xhrResp.result == null || xhrResp.result == undefined || xhrResp.result == [] || xhrResp.result == '') {
      resAmount = 'Error!';
    } else {
      resAmount = null;
      resAmount = xhrResp.result;
      console.log(resAmount);
    }
  }
  
  cleanner();
}/*convertValue*/

// const trataCurlData = () => {
//   console.log('tratando...');
//   viewAmount  = String(viewAmount)
//   viewFrom    = 'from=' + viewFrom;
//   viewTo      = 'to=' + viewTo;
//   viewAmount  = 'a=' + String(viewAmount);

//   console.log('values after tratar');
//   console.log(viewFrom);
//   console.log(viewTo);
//   console.log(viewAmount);

//   verifySomeData_Random2(viewFrom, viewTo, viewAmount);
// }/*trataCurlData*/

// const rebuildData = () => {
//   if (viewFrom == null || viewFrom == undefined) {
//     viewFrom = arrSelectedOps[0];
//   }
//   if (viewTo == null || viewTo == undefined) {
//     viewTo = arrSelectedOps[1];
//   }
// }/*rebuildData*/

// const verifySomeData_Random = (n, n1, n2) => {
//   let aux = Array(n, n1, n2);
//   for (let i = 0; i < aux.length; i++) {
//     if (aux[i] == null || aux[i] == undefined || aux[i] == [] || aux[i] == '') {
//       viewFrom    = null;
//       viewTo      = null;
//     }
//   }
// }/*verifySomeData_Random*/

// const verifySomeData_Random2 = (n, n1, n2) => {
//   let aux = Array(n, n1, n2);
//   if (aux[0].includes('from') && aux[1].includes('to') && aux[2].includes('a')) {
//     console.log('data ok');
//   } else {
//     trataCurlData();
//   }
// }/*verifySomeData_Random2*/




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