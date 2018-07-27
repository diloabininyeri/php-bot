<?php

namespace Dizimag\src;


use Interfaces\ResultRegex;
use PHPHtmlParser\Dom;

class Result implements ResultRegex
{
    /**
     * @var RegexDiziMag
     *
     */
    private $RegexDizimag, $array, $Dizimagcontent;

    /**
     * Result constructor.
     *
     */
    public function __construct()
    {

        $this->RegexDizimag = new RegexDiziMag();
        $this->Dizimagcontent = new Content();
    }


    public function getResultRegex($content)
    {

        $dom = new Dom();

        $dom->load($content);

        $find = $dom->find(".tvshows");


        $i = 0;
        foreach ($find as $item) {

            $this->array[$i]["img"] = $this->RegexDizimag->getImgSrcFromContentWithRegex($item->innerhtml);
            $href = $this->RegexDizimag->getTHrefFromContentWithRegex($item->innerhtml);

            $this->array[$i]["href"] = $href;

            $this->array[$i]["title"] = $this->RegexDizimag->getTitleFromContentWithRegex($item->innerhtml);
            $this->array[$i]["rate"] = $this->RegexDizimag->getRateFromContentWithRegex($item->innerhtml);
            $this->array[$i]["date"] = $this->RegexDizimag->getDateFromContentWithRegex($item->innerhtml);

            $newContent = $this->Dizimagcontent->fileGetContentRemoteSite($href);

            $this->array[$i]["description"] = $this->RegexDizimag->getDescriptionFromContentwithRegex($newContent);
            $i++;

        }

        return $this->array;

    }
}