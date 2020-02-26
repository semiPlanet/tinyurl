<?php
namespace Lib\Framework\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class HomeController
{
    public function index()
    {
        return view('home',['name' => 'safi']);
    }

    public function about()
    {
        echo 'this is about page from homecontroller';
    }

    public function page($page)
    {
        echo 'this page is '.$page.'from Home Controller';
    }

    public function tinyUrl()
    {
        try {
            $tinyurl = self::generateUrl($_POST['url']);
            return json_encode(['tiny_url' => $tinyurl]);
        } catch (\Throwable $th) {
            return json_encode(\trigger_error($th->getMessage()));
        }
    }

    protected function generateUrl($url)
    {
        return \file_get_contents('http://tinyurl.com/api-create.php?url='.$url);  
    }
}