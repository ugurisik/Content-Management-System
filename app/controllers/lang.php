<?php

use App\middleware\frontMw;

class lang extends Controller
{
    public function index(...$params)
    {
    }
    public function change(...$params)
    {
        $front = new frontMw;
        $front->changeLang($params[0], $_GET['p']);
    }
}
