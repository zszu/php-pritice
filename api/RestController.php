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
    case "single":
        $siteRestHandler = new SiteRestHandler();
        $siteRestHandler->getAllSite($_GET['id']);
    case "" :
        break;
}