<?php

namespace Dizimag\src;


use PHPHtmlParser\Dom;

class RegexDiziMag
{
    /**
     * @param $content
     * @return mixed
     *
     */
    public function getImgSrcFromContentWithRegex($content)
    {
        $re2 = '~<img(.*?)src="([^"]+)"(.*?)>~';
        preg_match_all($re2, $content, $matches2, PREG_SET_ORDER, 0);

        return $matches2[0][2];


    }


    /**
     * @param $content
     * @return string
     *
     */

    function getTHrefFromContentWithRegex($content)
    {
        $re2 = '~<a(.*?)href="([^"]+)"(.*?)>~';
        preg_match_all($re2, $content, $matches2, PREG_SET_ORDER, 0);

        return $matches2[0][2];


    }


    /**
     * @param $content
     * @return string
     *
     */
    function getTitleFromContentWithRegex($content)
    {

        $re = '/<img.+alt=[\'"](?P<alt>.+?)[\'"].*>/i';

        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);


        return $matches[0]["alt"];


    }


    /**
     * @param $content
     * @return mixed
     *
     *
     */

    public function getRateFromContentWithRegex($content)
    {

        $re = '/<div class="rating">(?P<star>.+)<\/div>/m';

        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);

        $explodeResultBySpaceChar = explode(" ", strip_tags($matches[0]["star"]));

        return $explodeResultBySpaceChar[1];

    }

    /**
     * @param $content
     * @return mixed
     *
     *
     */
    public function getDateFromContentWithRegex($content)
    {
        $re = '/<span>([0-9]{4})<\/span>/m';


        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);


        return $matches[0][1];
    }


    /**
     * @param $content
     * @return mixed
     *
     */
    public function getDescriptionFromContentwithRegex($content)
    {

        $re = '/<p>(.+)<\/p>/';
        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);

        return $matches[0][1];


    }
}