<?php
require_once "vendor/autoload.php";

header('Content-Type: application/json');

use Tiyatrolar\src\{
    Content, Result
};

/**
 *
 *
 * echo date("Ymd");
 * date("Ymd",strtotime("+1 month"));  1 ay sonrası
 *
 */
$startDate = 20180716;

$finishdate = 20180819;

$province = 34;




$content = (new Content())->fileGetContentRemoteSite("https://tiyatrolar.com.tr/sahnedekiler?d=$startDate-$finishdate&il=$province&f=");

$result = (new Result())->getResultRegex($content);


echo json_encode($result);

