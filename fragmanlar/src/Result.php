<?php

namespace Fragmanlar\src;

use Interfaces\ResultRegex;
use PHPHtmlParser\Dom;

class Result implements ResultRegex
{


    public function getResultRegex($content)
    {


        $array = [];
        $regexFragmanlar = new RegexFragmanlar();
        $contentFragmanlar = new Content();


        $re = '/<ul class="k_tek">(.+)<\/ul>.*<div class="sayfalama">/s';

        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);


        $matches[0][1];

        $dom = new Dom();

        $dom->load($content);

        $find = $dom->find("li");

        $i = 0;
        foreach ($find as $item) {

            $array[$i]["img"] = $regexFragmanlar->getImgSrcFromContentWithRegex($item);
            $array[$i]["title"] = $regexFragmanlar->getTitleFromContentWithRegex($item)[0];
            $array[$i]["img"] = $regexFragmanlar->getImageSrcFromContentWithRegex($item);
            $array[$i]["description"] = $regexFragmanlar->getDescriptionFromContentWithRegex($item);
            $href = $regexFragmanlar->getHrefFromContentWithRegex($item);
            $array[$i]["href"] = $href;

            $newContentPage = $contentFragmanlar->fileGetContentRemoteSite($href);
            $array[$i]["video"] = $regexFragmanlar->getVideoEmbedFromContentWithRegex($newContentPage);

            $i++;
        }


        return $array;

    }

}

