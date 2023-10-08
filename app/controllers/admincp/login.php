<?php

use App\middleware\authMw;

class login extends Controller
{
    public function index(...$params)
    {
        $auth = new authMw;
        if (isset($_POST['email']) && isset($_POST['password'])) {
           echo $auth->Login($_POST['email'], $_POST['password'], true, true);
        } else {
            $auth->isLogged(true,true);
            $this->view('admin', 'login', [], false);
        }
    }
}
