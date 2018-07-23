<?php

namespace Diziler\src;


class Result
{
    /**
     * @var array
     *
     */
    private $array = [];

    private $regexDiziler;

    /**
     * @param Content $content
     * @return array
     *
     *
     */


    public function __construct()
    {

        $this->regexDiziler = new RegexDiziler();

    }


    /**
     * @param $content
     * @return array
     *
     *
     */
    public function getResultRegex($content)
    {


        preg_match_all('@<a class="search-item" href=".*" title=".*">(.*?)<\/a>@si', $content, $found,PREG_PATTERN_ORDER);

        $index = 0;

        $siteUrl='http://www.diziler.com';







            foreach ($found[0] as $val)
            {



                $this->array[$index]["title"] =$this->regexDiziler->getTitleFromContentWithRegex($val);
                $this->array[$index]["resim"] = $siteUrl.$this->regexDiziler->getImagefromContentWithRegex($val)[1];
                $this->array[$index]["href"] = $siteUrl.$this->regexDiziler->getTHrefFromContentWithRegex($val);
                $this->array[$index]["video"]=$this->regexDiziler->getVideoSrcFromurlWithRegex(file_get_contents($siteUrl.$this->regexDiziler->getTHrefFromContentWithRegex($val)));
                $index += 1;


            }



        return $this->array ;


    }

}