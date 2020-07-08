<?php
require_once('SiteRestHandler.php');

$view = $_GET['view'] ?? '';

/**
 * RESTful service 控制器
 * URL 映射
 */
switch ($view){
    case "all" :
        $siteRestHandler = new SiteRestHandler();
        $siteRestHandler->getAllSites();
         break;
    case "single":
        $siteRestHandler = new SiteRestHandler();
        $siteRestHandler->getSite($_GET['id']);
         break;
    case "" :
        break;
}