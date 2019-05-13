<?php
/**
 * Created by PhpStorm.
 * User: Anastasia
 * Date: 09.05.2019
 * Time: 13:46
 */
session_start();
function ToRomanNumerals($num, $prefix='***')
{
    static $cnv = [
        ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX'],
        ['', 'X', 'XX', 'XXX', 'XL', 'L', 'LX', 'LXX', 'LXXX', 'XC',],
        ['', 'C', 'CC', 'CCC', 'CD', 'D', 'DC', 'DCC', 'DCCC', 'CM',],
        ['', 'M', 'MM', 'MMM'],
    ];
    $ns = strrev((int)$num);
    return ($num > 3999 ? $prefix : '') . ($cnv[3][$ns{3} ?? 0] ?? '') . $cnv[2][$ns{2} ?? 0] . $cnv[1][$ns{1} ?? 0] . $cnv[0][$ns{0} ?? 0];
}
//Кодирование и декодирование в JSON
$_SESSION['inputValue'] = str_replace(' ', '', json_decode($_POST['inputValue']));
$_SESSION['outputValue'] = ToRomanNumerals(json_decode($_POST['inputValue']));
$inputVal = str_replace(' ', '', json_decode($_POST['inputValue']));
$date = date('m/d/Y h:i:s a', time());
$outputVal = ToRomanNumerals(json_decode($_POST['inputValue']));
require_once 'connections.php';

$sql = "insert into actions(inputValue,outputValue) values('$inputVal','$outputVal')";
mysqli_query($link,$sql);
echo '<script>window.location.replace("index.php")</script>';
