<?php

namespace Tiyatrolar\src;


class Result
{
    /**
     * @var array
     *
     */
    private $array = [],
        $regexTiyatrolarComTr,
        $contentTiyatrolarComTr;


    /**
     * Result constructor.
     *
     */
    public function __construct()
    {

        $this->regexTiyatrolarComTr = new RegexTiyarolarComTr();
        $this->contentTiyatrolarComTr = new Content();

    }


    /**
     * @param $content
     * @return array
     *
     *
     */
    public function getResultRegex($content)
    {


        preg_match_all('@<article class="widget top-img text-center item_activity item_activity_"(.*?)</article>@si', $content, $found);

        $index = 0;

        foreach ($found[0] as $val) {

            $this->array[$index]["title"] = $this->regexTiyatrolarComTr->getTitleFromContentWithRegex($val);
            $this->array[$index]["resim"] = $this->regexTiyatrolarComTr->getImagefromContentWithRegex($val)[1];
            $href = $this->regexTiyatrolarComTr->getTHrefFromContentWithRegex($val);

            $this->array[$index]["href"] = $href;

            $contentNewLinkPage = $this->contentTiyatrolarComTr->fileGetContentRemoteSite($href);

            $this->array[$index]["seans"] = $this->regexTiyatrolarComTr->getSeansFromContentWithRegex($contentNewLinkPage);
            $this->array[$index]["description"] = $this->regexTiyatrolarComTr->getDescriptionFromContentWithRegex($contentNewLinkPage);

            $index += 1;
        }


        return $this->array;


    }

}