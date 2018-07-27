<?php

namespace Star\src;


use PHPHtmlParser\Dom;

class RegexStar
{


    /**
     * @param $content
     * @return mixed
     *
     *
     */
    final public function getImgSrcFromContentWithRegex($content)
    {

        $re2 = '~<img(.*?)data-src="([^"]+)"(.*?)>~';
        preg_match_all($re2, $content, $matches2, PREG_SET_ORDER, 0);

        return $matches2[0][2];
    }

    /**
     * @param $content
     * @return mixed
     *
     *[
     */
    public function getTitleFromContentWithRegex($content)
    {

        $re = '/".+">(.+[A-ZŞÇİĞPÖÜ]+)<\/a>/m';


        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);

        return $matches[0][1];
    }


    /**
     * @param $content
     * @return array
     *
     *
     *
     */
    public function getFrgmanVideosHrefFromContentWithRegex($content)
    {

        $dom = new Dom();
        $dom->load($content);

        $find = $dom->find('li[class="current-infinite-item"]');


        $array = [];

        foreach ($find as $item)
            $array[] = $item->innerhtml;


        $returnArray = [];


        $prefixHref = "https://www.startv.com.tr";

        foreach ($array as $item)
            $returnArray[] = $prefixHref . $this->getTHrefFromContentWithRegex($item);

        return $returnArray;
    }

    /**
     * @param $content
     * @return mixed
     *
     *
     */
    function getTHrefFromContentWithRegex($content)
    {
        $re2 = '~<a(.*?)href="([^"]+)"(.*?)>~';
        preg_match_all($re2, $content, $matches2, PREG_SET_ORDER, 0);

        return $matches2[0][2];


    }


}


