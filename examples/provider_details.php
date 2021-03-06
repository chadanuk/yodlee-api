<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (! ini_get('date.timezone')) {
    date_default_timezone_set('America/New_York');
}

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$yodleeApi = new \YodleeApi\Client(getenv('YODLEEAPI_URL'));

$response = $yodleeApi->cobrand()->login(getenv('YODLEEAPI_COBRAND_LOGIN'), getenv('YODLEEAPI_COBRAND_PASSWORD'));
$response = $yodleeApi->providers()->getDetail(2852); // Bank of America.

print 'RESULT<pre>';
print_r($response);
print '</pre>';
