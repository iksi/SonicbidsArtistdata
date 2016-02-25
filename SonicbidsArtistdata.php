<?php

/**
 * Simple class to fetch Artistdata feeds
 *
 * @author Iksi <info@iksi.cc>
 * @version 1.0
 */

namespace Iksi;

class SonicbidsArtistdata {
    
    public function request($feedURL) {

        $curlHandle = curl_init();

        curl_setopt($curlHandle, CURLOPT_URL, $feedURL);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandle, CURLOPT_HEADER, false);

        $response = curl_exec($curlHandle);
        $responseCode = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);

        curl_close($curlHandle);

        if ($responseCode !== 200) {
            return false;
        }

        $object = simplexml_load_string($response, null, LIBXML_NOCDATA)

        return $object;
    }

}