<?php
require_once "vendor/autoload.php";

//header('Content-Type: application/json');

use Sinemia\src\{Content,Result};



$content=(new Content())->fileGetContentRemoteSite("https://www.sinemia.com/gelecek-filmler");


$result=(new Result())->getResultRegex($content);

echo "<pre>";


print_r($result);

echo "</pre>";

