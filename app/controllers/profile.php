<?php

use App\middleware;

class profile extends Controller
{
    public function index(...$params)
    {
        $this->view('admin', 'index', ['params' => $params]);
    }
    public function bank(...$params)
    {
        $bankMw = new middleware\bankMw;
        $datas = $bankMw->getAll();
        if (isset($params[2])) {
            if ($params[2] == 'add') {
                echo $bankMw->AddBank($_POST);
            } elseif ($params[2] == 'delete') {
                echo $bankMw->DeleteBank($_POST);
            } elseif ($params[2] == 'update') {
                echo $bankMw->UpdateBank($_POST);
            } else {
                $data = $bankMw->get($params[2]);
                $this->view('admin', 'bank', ['datas' => $datas, 'data' => $data, 'params' => $params]);
            }
        } else {
            $this->view('admin', 'bank', ['datas' => $datas, 'params' => $params]);
        }
    }
    public function bussiness(...$params)
    {
        $mw = new middleware\bussinessMw;
        $datas = $mw->getAll();
        if (isset($params[2])) {
            if ($params[2] == 'add') {
                echo $mw->Add($_POST);
            } elseif ($params[2] == 'delete') {
                echo $mw->Delete($_POST);
            } elseif ($params[2] == 'update') {
                echo $mw->Update($_POST);
            } else {
                $data = $mw->get($params[2]);
                $this->view('admin', 'bussiness', ['datas' => $datas, 'data' => $data, 'params' => $params]);
            }
        } else {
            $this->view('admin', 'bussiness', ['datas' => $datas, 'params' => $params]);
        }
    }
    public function contact(...$params)
    {
        $mw = new middleware\contactMw;
        $datas = $mw->getAll();
        if (isset($params[2])) {
            if ($params[2] == 'add') {
                echo $mw->Add($_POST);
            } elseif ($params[2] == 'delete') {
                echo $mw->Delete($_POST);
            } elseif ($params[2] == 'update') {
                echo $mw->Update($_POST);
            } else {
                $data = $mw->get($params[2]);
                $this->view('admin', 'contact', ['datas' => $datas, 'data' => $data, 'params' => $params]);
            }
        } else {
            $this->view('admin', 'contact', ['datas' => $datas, 'params' => $params]);
        }
    }
    public function education(...$params)
    {
        $this->view('admin', 'education', ['params' => $params]);
    }
    public function experience(...$params)
    {
        $this->view('admin', 'experience', ['params' => $params]);
    }
    public function gallery(...$params)
    {
        $this->view('admin', 'gallery', ['params' => $params]);
    }
    public function hobbies(...$params)
    {
        $this->view('admin', 'hobbies', ['params' => $params]);
    }
    public function licences(...$params)
    {
        $this->view('admin', 'licences', ['params' => $params]);
    }
    public function location(...$params)
    {
        $this->view('admin', 'location', ['params' => $params]);
    }
    public function personal(...$params)
    {
        $mw = new middleware\personalMw;
        $datas = $mw->get();
        if (isset($params[2])) {
            if ($params[2] == 'add') {
                echo $mw->AddOrUpdate($_POST);
            } elseif ($params[2] == 'delete') {
                echo $mw->Delete($_POST);
            } elseif ($params[2] == 'update') {
                echo $mw->Update($_POST);
            } else {
                $data = $mw->get();
                $this->view('admin', 'personal', ['datas' => $datas, 'data' => $data, 'params' => $params]);
            }
        } else {
            $this->view('admin', 'personal', ['datas' => $datas, 'params' => $params]);
        }
    }
    public function socialmedia(...$params)
    {
        $mw = new middleware\socialmediaMw;
        $datas = $mw->get();
        if (isset($params[2])) {
            if ($params[2] == 'add') {
                echo $mw->AddOrUpdate($_POST);
            } elseif ($params[2] == 'delete') {
                echo $mw->Delete($_POST);
            } elseif ($params[2] == 'update') {
                echo $mw->Update($_POST);
            } else {
                $data = $mw->get();
                $this->view('admin', 'socialmedia', ['datas' => $datas, 'data' => $data, 'params' => $params]);
            }
        } else {
            $this->view('admin', 'socialmedia', ['datas' => $datas, 'params' => $params]);
        }
    }
}
