<?php

namespace App\helpers\session;

class sessionManager
{
    public $model;
    public function __construct($model)
    {
        $this->model = $model;
        if (empty($this->getSession('_token'))) {
            $this->createSession(['_token' => md5(uniqid())]);
        }
    }

    public function createSession($array = [])
    {
        foreach ($array as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }
    public function deleteSession($key)
    {
        unset($_SESSION["" . $key . ""]);
    }
    public function allSessionDelete()
    {
        session_unset();
        session_destroy();
    }
    public function getSession($key)
    {
        return $_SESSION['' . $key . ''];
    }
    public function getAll()
    {
        if (empty($_SESSION)) {
            $_SESSION['null'] = "null";
        }
        return $_SESSION;
    }
    public function isLogged($token, $sessionParamName, $sessionParamToken, $isAdmin)
    {
        if (empty($this->getSession($sessionParamName)) && $this->getSession($sessionParamName) == false && empty($this->getSession($sessionParamToken)) && $this->getSession($sessionParamToken) == false) {
            return false;
        } else {
            if ($token == $this->getSession($sessionParamToken)) {
                if ($isAdmin) {
                    $time = LOGIN_TOKEN_TIME_ADMIN_LIMIT;
                    $timeSTR = LOGIN_TOKEN_TIME_ADMIN;
                } else {
                    $time = LOGIN_TOKEN_TIME_USER_LIMIT;
                    $timeSTR = LOGIN_TOKEN_TIME_USER;
                }
                if (time() - $this->getSession($timeSTR) > $time) {
                    $this->allSessionDelete();
                    return false;
                } else {
                    return true;
                }
            } else {
                $this->allSessionDelete();
                return false;
            }
        }
    }
}
