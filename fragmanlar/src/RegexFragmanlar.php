<?php

namespace Fragmanlar\src;


class RegexFragmanlar
{


    /**
     * @param $content
     * @return mixed
     *
     */

    public function getImgSrcFromContentWithRegex($content)
    {

        preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $content, $result);
        return $result['src'];
    }


    /**
     * @param $content
     * @return mixed
     *
     */

    public function getTitleFromContentWithRegex($content)
    {

        $re = '/<div class="k_tek_icerik"><h2>(.+)<\/h2>/s';


        preg_match_all($re, $content, $matches, PREG_OFFSET_CAPTURE, 0);


        return $matches[0][0];

    }


    /**
     * @param $content
     * @return mixed
     *
     */
    public function getHrefFromContentWithRegex($content)
    {

        $re2 = '~<a(.*?)href="([^"]+)"(.*?)>~';
        preg_match_all($re2, $content, $matches2, PREG_SET_ORDER, 0);

        return $matches2[0][2];

    }

    /**
     * @param $content
     * @return mixed
     *
     *
     */
    public function getImageSrcFromContentWithRegex($content)
    {


        preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $content, $result);
        return $result["src"];
    }


    public function getDescriptionFromContentWithRegex($content)
    {
        $re = '/<p>(?P<desc>.+)<\/p>/s';


        preg_match($re, $content, $matches, PREG_OFFSET_CAPTURE, 0);


        return $matches["desc"][0];


    }

    /**
     * @param $content
     * @return mixed
     *
     *
     */

    public function getVideoEmbedFromContentWithRegex($content)
    {


        $re = '/<meta itemprop="embedURL" content="(?P<video>.+)" \/><link itemprop="url" /s';


        preg_match($re, $content, $matches, PREG_OFFSET_CAPTURE, 0);


        return $matches["video"][0];
    }
}


