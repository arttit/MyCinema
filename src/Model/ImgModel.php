<?php
namespace Model;
class ImgModel 
{
    function getMovieInfo($imdbid)
    {
        $arr = array();
        $imdbUrl = $imdbUrl = "http://www.imdb.com/title/" . $imdbid . "/";
        if($imdbUrl === NULL){
            $arr['error'] = "An error occurred!!";
            return $arr;
        }
        $html = $this->geturl($imdbUrl);
        if(stripos($html, '<link rel="canonical"') !== false){
            $arr = $this->scrapMovieInfo($html);
        } else {
            $arr['error'] = "An error occurred!";
        }
        return $arr;
    }
    function getIMDbUrlFromBing($title){
        $url = "http://www.bing.com/search?q=imdb+" . rawurlencode($title);
        $html = $this->geturl($url);
        $urls = $this->match_all('/<a href="(http:\/\/www.imdb.com\/title\/tt.*?\/)".*?>.*?<\/a>/ms', $html, 1);
        if (!isset($urls[0]))
            return NULL;
        else
            return $urls[0]; 
    }
    function scrapMovieInfo($html)
    {
        $arr = array();
        preg_match("/>Director:(.+)<span itemprop=\"director\"(.+)\"name\">(.+)<\/span><\/a><\/span>/msi", $html, $director);
        if(isset($director[0]) && $director[0]!=''){
            preg_match("/\"name\">.{2,30}<\/span>/msi", $director[0], $directors);
            if(isset($directors[0])){
                $explodeL = explode('>', $directors[0]);
                $explodeR = explode('<', $explodeL[1]);
                $arr['director']= $explodeR[0];
            }
        }
        preg_match("/<img alt=\"(.+)[P][o][s][t][e][r]\".title=\"(.+)[P][o][s][t][e][r]\".src=\"(.+)images\/M\/(.+)itemprop=......../ms", $html, $Poster);
        if(isset($Poster[3])){      
            $PosterImg = explode('"',$Poster[3]);
            $explodePoster = explode(':', $PosterImg[0]);
            $arr['poster'] = 'http:'.$explodePoster[1];
        }
        preg_match('/<strong\stitle="(.+)ratings">/', $html, $Rating);
        if(isset($Rating[1])){
            $arr['rating'] = $Rating[1];
        }
        return $arr;
    }
    function geturl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $ip=rand(0,255).'.'.rand(0,255).'.'.rand(0,255).'.'.rand(0,255);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: $ip", "HTTP_X_FORWARDED_FOR: $ip"));
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/".rand(3,5).".".rand(0,3)." (Windows NT ".rand(3,5).".".rand(0,2)."; rv:2.0.1) Gecko/20100101 Firefox/".rand(3,5).".0.1");
        $html = curl_exec($ch);
        curl_close($ch);
        return $html;
    }
    function match_all($regex, $str, $i = 0)
    {
        if(preg_match_all($regex, $str, $matches) === false)
            return false;
        else
            return $matches[$i];
    }
    function match($regex, $str, $i = 0)
    {
        if(preg_match($regex, $str, $match) == 1)
            return $match[$i];
        else
            return false;
    }
}
?>