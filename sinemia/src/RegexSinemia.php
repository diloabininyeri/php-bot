<?php


namespace Sinemia\src;


class RegexSinemia
{
    /**
     * @var
     *
     */
    public $contentOfPregMatchAll;


    /**
     * @param $content
     * @return mixed
     *
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
     */
    function getImagefromContentWithRegex($content)
    {
        preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $content, $result);
        return $result;
    }


    /**
     * @param $content
     * @return string
     *
     */
    function getDescriptionFromContentWithRegex($content)
    {

        unset($content);
        return "";

    }


    /**
     * @param $content
     * @return mixed
     *
     *
     */
    public function getVisionDateFromContentWithRegex($content)
    {
        $re = '/<td>([0-9]+.\D*\s\d*)<\/td>/m';

        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);


        return $matches[0][1];

    }


    /**
     * @param $content
     * @return mixed
     *
     *
     */
    public function getDemonstrationDateFromContentWithRegex($content)
    {
        $re = '/<div class=".+"\sdata-day="(.*)">\d+\n<br><span>(.*)<\/span>/m';

        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);

        return $matches;

    }


    /**
     * @param $content
     * @return mixed
     *
     */

    public function getHrefFragmanVideoFromContentWithRegex($content)
    {
        $re = '/<a\s+class="trailer"\shref="(.*?)"/m';

        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);

        return $matches[0][1];

    }


    /**
     * @param $content
     * @return mixed
     *
     *
     */

    public function getEmbedVideoFragmanFromContentWithRegex($content)
    {

        $re = '/<iframe.+>/m';
        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);

        return $matches[0][0];

    }


}