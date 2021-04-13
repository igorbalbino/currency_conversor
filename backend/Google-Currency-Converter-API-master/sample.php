<?php

/**
* Google Currency Converter API is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version,
* and distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* Sample File
*
* @package    Google Currency Converter API
* @author     Ekachai Omkaew <ekaomk@gmail.com>
* @copyright  1997-2015 Ekachai Omkaew
* @license    GNU General Public License (GNU GPL or GPL): http://www.gnu.org/licenses/
*/

$date = new DateTime();
$allCurrency = Array();

require_once('currency.class.php');

$currency = new Currency();

public function convetCurrency ($from, $to) {
  $result = $currency->convert($from, $to, 1);
  $datetime = $date->format('Y-m-d H:i:s');
  return Array($result, $datetime);
}

public function getAllCurrencies () {
  $currencies = $currency->getAllCurrency();
  foreach ($currencies as $key => $value) {
    $allCurrency[$key] = $value;
  }
  return $allCurrency;
}