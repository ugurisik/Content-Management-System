<?php
use App\middleware\authMw;
class main extends Controller
{
    public function index(...$params)
    {
        $auth = new authMw;
        $auth->isLogged(true,false);
      
        $this->view('admin','bosTab', ['page' => 'main']);
    }
    public function test()
    {
        echo 'test';
    }
}
