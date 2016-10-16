<?php

/* MusicBrainz PHP Class for Web Service Version 2
 * Licence: http://musicbrainz.org/doc/Live_Data_Feed
 * API: http://musicbrainz.org/doc/Development/XML_Web_Service/Version_2
 */


    public function ReleaseSearch($release, $fmt = 'json') {
        $url = "http://musicbrainz.org/ws/2/release/?query=release:".urlencode($release)."&fmt=".$fmt;
        if ($fmt == 'json') {
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_USERAGENT, 'CdBase');
          $response = curl_exec ($ch);
          curl_close($ch);
          $response = json_decode($response, JSON_FORCE_OBJECT);
          print_r(error_get_last());
        }
        return $response;
    }

      public function DiscSearch($discid, $fmt = 'json') {
        $url = "http://musicbrainz.org/ws/2/release/".urlencode($discid)."?inc=recordings&fmt=$fmt";

          if ($fmt == 'json') {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, 'CdBase');
            $response = curl_exec ($ch);
            curl_close($ch);
            $response = json_decode($response, JSON_FORCE_OBJECT);
            print_r(error_get_last());
          }
          return $response;
      }
}
?>
