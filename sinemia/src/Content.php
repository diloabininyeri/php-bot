<?php


namespace Sinemia\src;



use Interfaces\ContentInterface;

class Content implements ContentInterface
{
    /**
     * @param $contentUrl
     * @return bool|string
     *
     */
    public function fileGetContentRemoteSite($contentUrl)
    {

        return file_get_contents($contentUrl);
    }


}