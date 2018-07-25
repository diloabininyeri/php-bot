<?php

namespace Reyting\src;


class RegexReyting
{

    /**
     * @param $content
     * @return mixed
     *
     *
     */

    public function getProgramNameFromReytingListWithRegex($content)
    {

        $re = '/<span class="w225">(.+)\n?\s+<\/span>/m';

        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);


        return strip_tags($matches[0][0]);


    }


    /**
     * @param $content
     * @return string
     *
     */
    public function getChanelNameFromReytingwithRegex($content)
    {
        $re = '/<span class="w91">(.+)\n?\s+<\/span>/m';


        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);

        return strip_tags($matches[0][0]);

    }


    /**
     * @param $content
     * @return mixed
     *
     */
    public function getHrefReytingFromReytingWithRegex($content)
    {

        $re = '/<a href="(.+)">.+<\/a>/m';

        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);


        return $matches[0][1];

    }

}