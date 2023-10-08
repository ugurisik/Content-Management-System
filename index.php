<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR | E_PARSE);

date_default_timezone_set('Europe/Istanbul');

session_start();

require_once 'init.php';

try {
    $system = new System();
} catch (\Throwable $th) {
    header("HTTP/1.0 500 Internal Server Error");
    // $debugbar["messages"]->addMessage($th->getMessage());
    exit($th->getMessage());
}
