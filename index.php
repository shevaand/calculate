<?php
//тут можно просто написать
$url = simplexml_load_file("https://api.privatbank.ua/p24api/pubinfo?exchange&coursid=5");

if(!$url) {
    exit('no web-site connect');
}
else {
    foreach($url as $i => $item) {
        echo get_object_vars($item->exchangerate)['@attributes']['ccy'] . ': ' . get_object_vars($item->exchangerate)['@attributes']['buy'] . '<br>';
    }
}

?>


<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<link href="calc.css" rel="stylesheet" type="text/css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="calc.js"></script>
	 
	<title>Converter</title>
</head>
<body>
	<div class="calc_body">
<span>Калькулятор стоимости</span>
<form name="calc_form" action="" id="calc_formid">
    <label for="calc_amount">Cумма в UAH:</label>
    <input name="calc_amount" value="1" size="4" />
    <div class="calc_clear"></div>
    <label for="calc_rates">Валюта:</label>
    <select name="calc_rates" id="ratesoption">
    <option value="RUR">RUB</option>
    <option value="EUR">EUR</option>
    <option value="USD">USD</option>
    <option value="UAH">UAH</option>
    </select>
    <div class="calc_clear"></div>
    <input type="submit" value="Расчет" name="calc_do" class="calc_button" />
</form>
<label>Результат: </label><input name="result" id="calc_result" value="" disabled="disabled" size="8" />
<div class="calc_clear"></div>
<div id="calc_error"></div>
</div>
</body>
</html>

