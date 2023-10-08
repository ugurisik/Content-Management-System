<?php

use App\middleware\userMw;

class main extends Controller
{
    public function index(...$params)
    {
        // if (isset($params[0])) {
        //     $userMw = new userMw;
        //     $user = $userMw->getUser($params[0]);
        //     if ($user) {
        //         echo '<pre>';
        //         print_r($user);
        //         echo '</pre>';
        //     } else {
        //         echo 'user not found';
        //     }
        // }
        // echo '<pre>';
        // print_r($params);
        // echo '</pre>';
        $this->view('main','index');
        // $this->log->createLog();
        // print_r($this->security::getLang());
        // $this->mailFunction;
        print_r($this->session->getSession('lang'));
    }
    public function test()
    {
        echo 'test';
        $this->model('users/userModel')->get();
    }
}
