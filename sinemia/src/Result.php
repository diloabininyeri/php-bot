<?php

namespace Sinemia\src;


class Result
{
    /**
     * @var array
     *
     */
    private $array = [];

    private $regexSinemia,
        $contentSinemia;

    /**
     * Result constructor.
     *
     *
     */

    public function __construct()
    {

        $this->regexSinemia = new RegexSinemia();
        $this->contentSinemia = new Content();


    }


    /**
     * @param $content
     * @return array
     *
     *
     */
    public function getResultRegex($content)
    {


        preg_match_all('@<div class="movie-box-new">(.*?)</div>@si', $content, $found);

        $index = 0;


        foreach ($found[0] as $val) {


            $this->array[$index]["title"] = $this->regexSinemia->getTitleFromContentWithRegex($val);
            $this->array[$index]["resim"] = $this->regexSinemia->getImagefromContentWithRegex($val)[1];
            $this->array[$index]["href"] = $this->regexSinemia->getTHrefFromContentWithRegex($val);

            $newLinkPageContent = $this->contentSinemia->fileGetContentRemoteSite($this->regexSinemia->getTHrefFromContentWithRegex($val));

            $this->array[$index]["visiondate"] = $this->regexSinemia->getVisionDateFromContentWithRegex($newLinkPageContent);

            $fragmanVideoHrefPage=$this->regexSinemia->getHrefFragmanVideoFromContentWithRegex($newLinkPageContent);

            $this->array[$index]["fragmanpagelink"]=$fragmanVideoHrefPage;

            $this->array[$index]["embedvideo"]=$this->regexSinemia->getEmbedVideoFragmanFromContentWithRegex($this->contentSinemia->fileGetContentRemoteSite($fragmanVideoHrefPage));





            $index += 1;
        }


        return $this->array;


    }

}