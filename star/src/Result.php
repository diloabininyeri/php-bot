<?php

namespace Star\src;

use Interfaces\ResultRegex;
use PHPHtmlParser\Dom;

class Result implements ResultRegex
{
    /**
     * @var
     *
     */
    private $RegexStar, $array = [],$contentStar;

    /**
     * Result constructor.
     *
     */
    public function __construct()
    {
        $this->RegexStar = new RegexStar();
        $this->contentStar=new Content();
    }

    public function getResultRegex($content)
    {

        $linkSite="https://www.startv.com.tr";

        $dom = new Dom();

        $dom->load($content);

        $find = $dom->find("h2");



        $i = 0;
        foreach ($find as $item) {
            //$this->array[$i]["html"]=$item->innerhtml;


            $this->array[$i]["img"] = $this->RegexStar->getImgSrcFromContentWithRegex($item->innerhtml);
            $this->array[$i]["date"]=$this->RegexStar->getDateFromContentWithRegex($item->innerhtml);
            $href = $linkSite.$this->RegexStar->getTHrefFromContentWithRegex($item->innerhtml);
            $this->array[$i]["href"] = $href;

            $fragmanLink="$href/fragmanlar";

            $this->array[$i]["fragmanlink"]=$fragmanLink;

            $this->array[$i]["title"] = $this->RegexStar->getTitleFromContentWithRegex($item->innerhtml);

            $newContentFragmanLink=$this->contentStar->fileGetContentRemoteSite($fragmanLink);

            $this->array[$i]["video"]=$this->RegexStar->getFrgmanVideosHrefFromContentWithRegex($newContentFragmanLink);


            $i++;

        }

        return $this->array;

    }

}

