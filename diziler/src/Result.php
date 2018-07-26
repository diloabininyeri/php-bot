<?php

namespace Diziler\src;

use Interfaces\ResultRegex;
use PHPHtmlParser\Dom;

class Result implements ResultRegex
{
    /**
     * @var array
     *
     */
    private $array = [];

    private $regexDiziler;


    /**
     * Result constructor.
     *
     */
    public function __construct()
    {

        $this->regexDiziler = new RegexDiziler();

    }


    /**
     * @param $content
     * @return array
     *
     *
     */
    public function getResultRegex($content)
    {


        $dom = new Dom();

        $dom->load($content);

        $find = $dom->find(".search-item");


        $index = 0;

        $siteUrl = 'http://www.diziler.com';


        foreach ($find as $val) {


            $this->array[$index]["title"] = $this->regexDiziler->getTitleFromContentWithRegex($val);
            $this->array[$index]["resim"] = $siteUrl . $this->regexDiziler->getImagefromContentWithRegex($val)[1];
            $this->array[$index]["href"] = $siteUrl . $this->regexDiziler->getTHrefFromContentWithRegex($val);
            $this->array[$index]["video"] = $this->regexDiziler->getVideoSrcFromurlWithRegex(file_get_contents($siteUrl . $this->regexDiziler->getTHrefFromContentWithRegex($val)));
            $this->array[$index]["description"]=$this->regexDiziler->getDescriptionFromContentWithRegex($val);
            $index += 1;


        }


        return $this->array;


    }

}