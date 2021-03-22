<template>
  <div class="conversor">
    <div class="currencyFrom">
        <template>
          <h3><span>From:</span></h3>
          <select>
            <option value=""></option>
            <option value=""></option>
          </select>
        </template>
      </div>
      <div class="currencyTo">
        <h3><span>To:</span></h3>
          <select>
            <option value=""></option>
            <option value=""></option>
          </select>
      </div>
    <div class="currencyResult">
      <textarea class="currencyResultArea"></textarea>
    </div>
  </div>
</template>

<script>
  /*
  var arr;
  var url = 'http://api.currencylayer.com/';
  var endpoint;
  var key = '26c69564c33688772b250c1e505db841';
  */

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .currencyFrom{
    float: left;
  }

  .currencyTo{
    float: left;
  }

  .currencyResultArea {
    width: 60%;
    height: 40%;
  }
</style>