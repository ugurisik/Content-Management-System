<?php
use App\middleware\authMw;
class logout extends Controller
{
    public function index(...$params)
    {
        $auth = new authMw;
        $auth->logout();
        // if($auth->isLogged(true)){
        //     echo 'Logged';
        // }else{
        //     echo 'Not Logged';
        // }
        //print_r($auth->Login('abc@def.com', 'your_password_here', true,true));
        //$this->view('admin','index');
        print_r($_SESSION);
    }
}
