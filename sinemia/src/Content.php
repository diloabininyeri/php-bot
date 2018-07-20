<?php


namespace Sinemia\src;



class Content
{
    /**
     * @param $sitename
     * @return bool|string
     *
     */
    public function fileGetContentRemoteSite($contentUrl,$parameters=[])
    {

        return file_get_contents($contentUrl);
    }


}