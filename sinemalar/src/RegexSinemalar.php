<?php

namespace Sinemalar\src;


use PHPHtmlParser\Dom;

class RegexSinemalar
{

    /**
     * @var Dom
     * signletion pattern
     */
    private static $signgletionDom;

    /**
     * RegexSinemalar constructor.
     *
     * singletion pattern
     */
    public function __construct()
    {

        if (!self::$signgletionDom)
            self::$signgletionDom = new Dom();

        return self::$signgletionDom;
    }

    public function getHrefFromContentWithRegex($content)
    {

        $re2 = '~<a(.*?)href="([^"]+)"(.*?)>~';
        preg_match_all($re2, $content, $matches2, PREG_SET_ORDER, 0);


        $array = [];
        foreach ($matches2 as $find)
            $array[] = $find[2];

        return $array;


    }


    /**
     * @param $content
     * @return array
     *
     */

    public function getTitleFromcontentWithRegex($content)
    {
        $re2 = '~<a(.*?)title="([^"]+)"(.*?)>~';
        preg_match_all($re2, $content, $matches2, PREG_SET_ORDER, 0);


        $array = [];
        foreach ($matches2 as $find)
            $array[] = $find[2];

        return $array;

    }


    /**
     * @param $content
     * @return array
     *
     */
    public function getImgSrcFromcontentWithRegex($content)
    {
        $re2 = '~<img(.*?)src="([^"]+)"(.*?)>~';
        preg_match_all($re2, $content, $matches2, PREG_SET_ORDER, 0);


        $array = [];
        foreach ($matches2 as $find)
            $array[] = $find[2];

        return $array;

    }


    /**
     * @param $content
     * @return mixed
     *
     */

    public function getVideoSrcFromContentInMeta($content)
    {


        $re = '/<meta property="og:video" content="(.+)"\/>/m';


        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);


        return $matches[0][1];


    }


    /**
     * @param $content
     * @return mixed
     *
     *
     */

    public function getDescriptionFromContent($content)
    {


        $dom = self::$signgletionDom;

        $dom->load($content);

        $find = $dom->find('p[itemprop="description"]');

        return $find->text;


    }


}