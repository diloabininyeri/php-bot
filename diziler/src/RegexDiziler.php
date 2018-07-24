<?php


namespace Diziler\src;


class RegexDiziler
{
    /**
     * @var
     * $contentOfPregMatchAll;
     */
    public $contentOfPregMatchAll;


    /**
     * @param $content
     * @return string
     *
     */
    function getTitleFromContentWithRegex($content)
    {

        $re = '/<img.+alt=[\'"](?P<alt>.+?)[\'"].*>/i';

        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);


        return $matches[0][1];


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

        return isset($matches2[0][2]) ? $matches2[0][2] : "";


    }


    /**
     * @param $content
     * @return mixed
     *
     *
     */
    function getImagefromContentWithRegex($content)
    {
        preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $content, $result);
        return $result;
    }

    /**
     * @param $content
     * @return mixed
     *
     *
     */
    function getVideoSrcFromurlWithRegex($content)
    {


        preg_match_all("<meta property='og:video' content='(.*?)' />", $content, $result, PREG_PATTERN_ORDER);


        return $result[1][0];

    }

    /**
     * @param $content
     * @return mixed
     *
     *
     */
    function getDescriptionFromContentWithRegex($content)
    {

        $re = '/<samp>(.*)<\/samp>/m';

        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);


        return $matches[0][1];


    }


}