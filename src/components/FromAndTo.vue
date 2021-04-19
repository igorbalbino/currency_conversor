<template>
    <v-container>
        <template id="tFrom">
            <h3><span>From:</span></h3>
            <v-select v-model="viewFrom" v-bind:value="viewFrom" :key="viewFrom" :items="currencies" label="From" dense></v-select>
        </template>
        <template style="float: left; width: 5%;">
            <span><v-icon v-on:click="switchValuesFT">{{ icons.mdiArrowDecision }}</v-icon></span>
        </template>
        <template id="tTo">
            <h3><span>To:</span></h3>
            <v-select v-model="viewTo" v-bind:value="viewTo" :key="viewTo" :items="currencies" label="To" dense></v-select>
        </template>
    </v-container>
</template>

<script>
//IMPORTS
import vue from 'vue'
import VueLodash from 'vue-lodash'
import lodash from 'lodash'
// import ModalDefault from './components/ModalDefaul.vue'

//VUE
vue.use(VueLodash, { name: 'ldsVue' , lodash: lodash })

//EXPORTA DO VUE E PARA O VUE
export default {
    name: 'FromAndTo',
    components: {
        // ModalDefault
    },
    props: [
        'viewFrom', 
        'viewTo', 
    ],
    data () {
        return {
        // viewFrom, 
        // viewTo, 
        icons: {
            mdiArrowDecision,
        },
        // isModalVisible
        }
    },
    methods: {
    switchValuesFT: () => {
      switchValuesFT()
    },
    // closeModal: () => {
    //   closeModal()
    // }
  },
  render: function () {
    return {
      viewFrom, 
      viewTo,
    }
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

//VARIAVEIS
const xhr                                 = new XMLHttpRequest();
// const auxE                                = '&';
// const auxI                                = '?';
var xhrResp                               = null;
var url                                   = null;
var endpoint                              = null;
var method                                = null;
var currencies;
var viewFrom, viewTo;

//FUNCS
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
</script>

<style lang="scss" scoped>
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
</style>