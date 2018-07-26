<?php

namespace Dizimag\src;


class Content
{
    /**
     * @param $contentUrl
     * @return bool|string
     *
     *
     */
    public function fileGetContentRemoteSite($contentUrl)
    {

        return file_get_contents($contentUrl);
    }
}