<?php 
    require('PayPal-PHP-SDK/autoload.php');


    define('URL_SITIO','http://localhost/512');

    $apiContext= new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'AYw3scOJO2LrzEr1OhYO65APPSJfId3NI8KNnDrzzVt4H_CqkEeyEr8Mib22UC7YNv5BgmRXz2jeB9rV',
            'EBEZQI_s1gRO72s6wK7S864B6ttXX1FjkH2WF6H_ffC61FSETe1j953ekRBDvHeTmzFGkSLYE6HcFCO9'
        ) 
    );
?>