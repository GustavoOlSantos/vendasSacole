<?php
// Define a URL base automaticamente (http://localhost/sacoleVendas ou http://192.168.x.x/sacoleVendas)
$protocol = isset($_SERVER['HTTPS']) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$basePath = '/sacoleVendas';

define('BASE_URL', $protocol . $host . $basePath);
