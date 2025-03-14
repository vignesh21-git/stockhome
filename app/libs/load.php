<?php
// require 'vendor/autoload';

require "vendor/autoload.php";
include_once 'includes/Session.class.php';
include_once 'includes/User.class.php';
include_once 'includes/Database.class.php';
include_once 'includes/UserSession.class.php';
include_once 'includes/WebAPI.class.php';
include_once 'includes/REST.class.php';
include_once 'includes/API.class.php';



global $__site_config;
/*
Note: Location of configuration
in lab : /home/user/phtogramconfig.json
in server: /var/www/photogramconfig.json
*/  

$wapi = new WebAPI();
$wapi->initiateSession();

function get_config($key, $default = null)
{
    global $__site_config;

    // Since $__site_config is already an array, no need to use json_decode
    if (isset($__site_config[$key])) {
        return $__site_config[$key];
    } else {
        return $default;
    }
}

function load_template($name)
{
    include $_SERVER['DOCUMENT_ROOT'] . get_config('base_path') . "_templates/$name.php"; //not consistent.
}