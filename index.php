<?php
/**
 *
 * @api
 *
 * @link http://www.biletix.com/solr/tr/select/?start=0&rows=300&q=subcategory:tiyatro$ART&qt=standard&indent=true&fq=start:[2018-07-20T00:00:00Z TO 2020-07-20T00:00:00Z+1DAY]&sort=start asc, vote desc&&wt=json&indent=true&facet=true&facet.field=category&facet.field=venuecode&facet.field=region&facet.field=subcategory&facet.mincount=1&json.wrf=jQuery111303694218199738495_1532085330403&_=1532085330404
 */


require_once "vendor/autoload.php";


use Factory\FactoryClass;


$factory = new FactoryClass();


function p($array)
{
    echo "<pre>";

    print_r($array);

    echo "</pre>";

}

$result = $factory
    ->sendParameters($_GET)
    ->createClass($_GET["number"]);




header('Content-type: application/json; charset=utf-8');


p($result);

//echo json_encode($result);










