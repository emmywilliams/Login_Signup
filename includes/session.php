<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
]);

session_start();
if (!isset($_SESSION['last_regeneration'])) {
    regenerate_session_id();
} else {

    $interval = 60 * 30;

    if (time() - $_SESSION['last_regeneration'] >= $interval) {

        regenerate_session_id();
    }
}

function regenerate_session_id()
{
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
}
