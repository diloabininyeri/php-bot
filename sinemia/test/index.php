<?php
require_once "vendor/autoload.php";

header('Content-Type: application/json');

use Sinemia\src\Content;
use Sinemia\src\Result;



$content=(new Content())->fileGetContentRemoteSite("https://www.sinemia.com/gelecek-filmler");

$result=(new Result())->getResultRegex($content);


echo json_encode($result);

