<?php

use App\middleware\authMw;
use App\middleware\langsMw;

class langs extends Controller
{
    public function index(...$params)
    {
        $langs = new langsMw;
        $auth = new authMw;
        $auth->isLogged(true, false);
        if (isset($_POST['_token'])) {
            $auth->tokenCheck($_POST['_token']);
            if ($params[0] == 'add') {
                echo $langs->insert($_POST);
            } else if ($params[0] == 'update') {
                echo $langs->update($_POST, $params[1]);
            } else if ($params[0] == 'delete') {
                echo $langs->delete($_POST);
            } else if ($params[0] == 'translate') {
                echo $langs->translate($_POST, $params[1], $params[2]);
            }
        } else {
            $this->view('admin', 'langs', ['type' => $params[0], 'guid' => $params[1], 'lang' => $langs->langDatas('admin'), 'page' => 'langs']);
        }
    }
}
