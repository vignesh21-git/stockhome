<?php

require_once 'libs/load.php';

$api = new API();
try{
    $api->processAPI();
} catch(Exception $e){
    $api->die($e);
}