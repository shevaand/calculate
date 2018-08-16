<?php

header('Content-Type:  charset=utf8');
if (!file_exists('rates.ini')) {
    print_result(array('message' => 'Не найден файл с курсами валют!', 'type' => 'err'));
}
$data = parse_ini_file('rates.ini', true);
$amount = str_replace(",", ".", $_POST["calc_amount"]);
if (!preg_match("|^[0-9/.]+$|", $amount)) {
    print_result(array('message' => 'Сумма не является числом', 'type' => 'err'));
}
if (!isset($data[$_POST["calc_rates"]]["rate"])) {
    print_result(array('message' => 'Нет курса для указанной валюты', 'type' => 'err'));
}
$result = number_format((float)$data[$_POST["calc_rates"]]["rate"] * (float)$amount, 2, ',','');
if (isset($data[$_POST["calc_rates"]]["text"])) $result .= ' '.$data[$_POST["calc_rates"]]["text"];
print_result(array('message' => $result, 'type' => 'msg'));
 
function print_result($arr){
    echo json_encode($arr);
    die;
}