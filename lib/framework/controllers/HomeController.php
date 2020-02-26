<?php
namespace Lib\Framework\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class HomeController
{
    public function index()
    {
        return view('home');
    }

    public function tinyUrl()
    {
        try {
            $tinyurl = self::generateUrl($_POST['url']);
            return json_encode(['tiny_url' => $tinyurl]);
        } catch (\Throwable $th) {
            return json_encode($th->getMessage());
        }
    }

    protected function generateUrl($url)
    {
        return \file_get_contents('http://tinyurl.com/api-create.php?url='.$url);  
    }
}