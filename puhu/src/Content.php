<?php
 
namespace Puhu\src;

use Interfaces\ContentInterface;

class Content implements ContentInterface
{
    /**
     * @param $contentUrl
     * @return bool|string
     *
     *
     */
   public function fileGetContentRemoteSite($contentUrl)
    {


        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $contentUrl);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
        $query = curl_exec($curl_handle);
        curl_close($curl_handle);

        return $query;
    }
 
}
 
 