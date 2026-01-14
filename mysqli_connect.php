<?php

// DB config: prefer environment variables (for Docker/production), fallback to local defaults.
// Supported env vars:
// - MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE
// (Also supports DB_HOST/DB_USER/DB_PASS/DB_NAME as aliases.)
$dbHost = getenv('MYSQL_HOST') ?: (getenv('DB_HOST') ?: 'localhost');
$dbUser = getenv('MYSQL_USER') ?: (getenv('DB_USER') ?: 'root');
$dbPass = getenv('MYSQL_PASSWORD') ?: (getenv('DB_PASS') ?: '');
$dbName = getenv('MYSQL_DATABASE') ?: (getenv('DB_NAME') ?: 'mygov');

$dbc = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$dbc) {
    // In production you may want to log this instead of showing it.
    http_response_code(500);
    die('Database connection failed.');
}


?>