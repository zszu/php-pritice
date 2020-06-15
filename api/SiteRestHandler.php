<?php
require_once ("SimpleRest.php");
require_once ("Site.php");

class SiteRestHandler extends SimpleRest
{
    public function getAllSites(){
        $site = new Site();
        $rawData = $site->getAllSite();
        if(empty($rawData)){
            $statusCode = 404;
            $rawData = ['error'=>'No Sites found'];
        }else{

            $statusCode = 200;
        }
        $requestContentType = $_SERVER['HTTP_ACCEPT'];
        $this->setHttpHeader($requestContentType , $statusCode);
        if(strpos($requestContentType , 'application/json') !== false){
            $response = $this->encodeJson($rawData);
            echo $response;
        }elseif (strpos($requestContentType , 'application/xml') !== false){
            $response = $this->encodeXml($rawData);
            echo $response;
        }elseif (strpos($requestContentType , 'application/html') !== false){
            $response = $this->encodeHtml($rawData);
            echo $response;
        }

    }
    public function getSite($id){
        $site = new Site();
        $rawData = $site->getSite($id);
        if(empty($rawData)){
            $statusCode = 404;
            $rawData = ['error' => 'No sites found'];
        }else{
            $statusCode = 200;
        }
        $requestContentType = $_SERVER['HTTP_ACCEPT'];
        $this->setHttpHeader($requestContentType . $statusCode);
        if(strpos($requestContentType , 'application/json') !== false){
            $response = $this->encodeJson($rawData);
            echo $response;
        }elseif (strpos($requestContentType , 'application/xml') !== false){
            $response = $this->encodeXml($rawData);
            echo $response;
        }elseif (strpos($requestContentType , 'application/html') !== false){
            $response = $this->encodeHtml($rawData);
            echo $response;
        }
    }
    /**
     * @param $responseData   json
     * @return mixed
     */
    public function encodeJosn($responseData){
        $jsonRespone = json_encode($responseData);
        return $jsonRespone;
    }

    /**
     * @param $responseData   xml
     * @return mixed
     */
    public function encodeXml($responseData){
        $xml = new SimpleXMLElement('<?xml version="1.0"?><site></site>');
        foreach ($responseData as $k => $v){
            $xml->addChild($k , $v);
        }
        return $xml->asXML();
    }
    /**
     * @param $responseData   html
     * @return mixed
     */
    public function encodeHtml($responseData){
        $htmlRespone = "<table border='1'>";
        foreach ($responseData as $k => $v){
            $htmlRespone .= "<tr><td>".$k."</td><td>".$v."</td></tr>";
        }
        $htmlRespone .="</table>";
        return $htmlRespone;
    }



}