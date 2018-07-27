<?php

namespace Puhu\src;

use Interfaces\ResultRegex;
use PHPHtmlParser\Dom;

class Result implements ResultRegex
{
    private $regexPuhu, $array;

    /**
     * Result constructor.
     *
     */
    public function __construct()
    {


        $this->array = [];
        $this->regexPuhu = new RegexPuhu();
    }

    public function getResultRegex($content)
    {


        $i = 0;

        $dom = new Dom();


        $dom->load($content);

        $find = $dom->find(".image-component__placeholder");


        foreach ($find as $item)
           $this->array[]=$item->innerhtml;



        return $this->array;
    }

}

