<?php

namespace Tiyatrolar\src;


class RegexTiyarolarComTr
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
        $re = '~<a(.*?)title="([^"]+)"(.*?)>~';
        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);

        return isset($matches[1][2]) ? $matches[1][2] : '';
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

        return isset($matches2[1][2]) ? $matches2[1][2] : '';
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
     * @return array
     *
     */

    function getDescriptionFromContentWithRegex($content)
    {


        $re = '/<p>(.+?)<\/p>/m';
        $result = null;

        //$re = '<p>\n?(.+)<a href="#" class="expand_more" id="show_more_act_summary" style="display: block;"><br \/>DEVAMI<\/a';


        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);


        foreach ($matches as $item) {

            foreach ($item as $i) {
                if (strstr($i, "DEVAMI")) {

                    $arrayReplace = ["DEVAMI", "DAHA AZ GÖSTER"];

                    $result = str_replace($arrayReplace, "", strip_tags($i));
                    break 2;

                }


            }


        }

        return $result;


    }

    /**
     * @param $content
     * @return mixed
     *
     *
     */
    public function getFoundationDateFromContentwithRegex($content)
    {


        $re = '/<li>.*<\/i>(.+)<\/li>/m';
        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);


        return $matches[0][1];

    }

    /**
     * @param $content
     * @return mixed
     *
     */

    public function getSeansFromContentWithRegex($content)
    {

        $re = '/<p class="ses-p">(.+)<\/p>/m';

        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);


        $arrayReplace = ["BİLET AL", "DAHA AZ GÖSTER"];

        return str_replace($arrayReplace, "", strip_tags($matches[0][1]));


    }


    /**
     * @param $content
     * @return mixed
     *
     */

    public function getYoutbeVideoFromContentwithRegex($content)
    {
        $re = '/<a class="popup-youtube" href="(.+)">/m';


        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);


        return $matches[0][1];

    }

}