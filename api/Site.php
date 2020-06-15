<?php
class Site
{
    private  $siteArr = [
        1 => 'TaoBao',
        2 => 'Google',
        3 => 'BaiDu',
        4 =>'Weibo',
        5 => 'Sina',
    ];
    public function getAllSite(){
        return $this->siteArr;
    }
    public function getSite($id){
        $site = array($id => ($this->siteArr[$id] ?? $this->siteArr[1]));
        return $site;
    }
}