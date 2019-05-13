<?php
/**
 * Created by PhpStorm.
 * User: Anastasia
 * Date: 13.05.2019
 * Time: 12:06
 */
 //Подключение к БД
$link = mysqli_connect('localhost','test','test', 'test');

if (!$link) {
    echo 'Error, connection to database imposible'.PHP_EOL;
    exit;
}