<?php

namespace App\middleware;

class userMw extends \Controller
{
    public function getUser($param)
    {
        $control = $this->model('users/userModel')->getDataOrWhere(['Guid' => $param, 'ActivationCode' => $param, 'QRCode' => $param,'Slug' => $param]);
        if ($control) {
            return $control[0];
        } else {
            return false;
        }
    }
}