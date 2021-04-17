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
  },
  data () {
    return {
      // currencies,
      // selected,
      // isModalVisible
    }
  },
  // created () {
  //   getCurrencyData()
  // },
  methods: {
    // getHistory: (selected) => {
    //   // ...
    //   getCurrencyHistory(selected)
    // },
    // closeModal: () => {
    //   closeModal()
    // }
  },
  watch: {
  //   'selected': (data) => {
  //     selected = data;
  //   }
  }
}
  /*
  const xhr                                 = new XMLHttpRequest();
  // const auxE                                = '&';
  // const auxI                                = '?';
  // const auxB                                = '/';
  var arr;
  var xhrResp                               = null;
  var url                                   = null;
  var endpoint                              = null;
  var selected;
  var method                                = null;
  var currencies;
  var respHistory;

  /0**faz o curl GET da api *0/
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
  }/0*cleaner*0/

  /0**faz curl e retorna as moedas*0/
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
  };/0*getCurrencyData*0/ getCurrencyData();

  const getCurrencyHistory = (selected) => {
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
  };/0*getCurrencyData*0/ getCurrencyData();
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