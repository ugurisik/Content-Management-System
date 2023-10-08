<?php

namespace App\helpers\logs;
use App\helpers\security\securityManager as securityManager;
use App\helpers\functions\utils as utils;

class logManager
{
    public $security;
    public $utils;
    public $func;
    public function __construct($func)
    {
        $this->security = new securityManager;
        $this->utils = new utils($func);
        $this->func = $func;
    }
    public function createLog($UserGuid, $Explain)
    {
        $data = [
            'UserGuid' => $UserGuid,
            'Explain_' => $Explain,
            'Guid' => $this->utils->generateGuid(),
            'Browser' => $this->security->getBrowser(),
            'UserIP' => $this->security->getIP(),
            'OS' => $this->security->getOS(),
            'UserAgent' => $this->security->getUserAgent(),
            'BrowserLang' => $this->security->getLang(),
        ];
        $this->func->addData('user_log', $data);
    }
}
