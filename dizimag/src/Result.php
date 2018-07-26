<?php

namespace Dizimag\src;


use PHPHtmlParser\Dom;

class Result
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

            $this->array[$i]["img"] = $this->RegexDizimag->getImgSrcFromContentWithRegex($item);
            $href = $this->RegexDizimag->getTHrefFromContentWithRegex($item);

            $this->array[$i]["href"] = $href;

            $this->array[$i]["title"] =  $this->RegexDizimag->getTitleFromContentWithRegex($item);
            $this->array[$i]["rate"]  =  $this->RegexDizimag->getRateFromContentWithRegex($item);
            $this->array[$i]["date"]  =  $this->RegexDizimag->getDateFromContentWithRegex($item);

            $newContent = $this->Dizimagcontent->fileGetContentRemoteSite($href);

            $this->array[$i]["description"] = $this->RegexDizimag->getDescriptionFromContentwithRegex($newContent);
            $i++;

        }

        return $this->array;

    }
}