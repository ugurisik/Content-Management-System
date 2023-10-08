<?php

use App\helpers\logs\logManager as logManager;
use App\helpers\session\sessionManager as sessionManager;
use App\helpers\security\securityManager as security;
use App\helpers\mail\phpMail as phpMail;
use App\helpers\functions\mailFunction as mailFunction;
use App\helpers\errors\error as error;
use App\helpers\functions\utils as utils;
use App\helpers\functions\files as files;
use DebugBar\StandardDebugBar as StandardDebugBar;
use DebugBar\DataCollector\MessagesCollector as MessagesCollector;

class Controller
{
    public $log;
    public $session;
    public $security;
    public $mail;
    public $mailFunction;
    public $error;
    public $utils;
    public $files;
    public $debug;
    public function __construct()
    {
        $this->log = new logManager($this->model('sampleModel'));
        $this->session = new sessionManager($this->model('sampleModel'));
        $this->security = new security;
        $this->mail = new phpMail;
        $this->mailFunction = new mailFunction;
        $this->error = new error(new StandardDebugBar());
        $this->utils = new utils($this->model('sampleModel'));
        $this->files = new files(func: $this->model('sampleModel'));
        if ($this->session->getSession('lang') == null) {
            $lang = mb_strtolower($this->security->getLang());
            if ($this->utils->checkLangTranslateDir($lang)) {
                $this->session->createSession(['lang' => $lang]);
            } else {
                $defaultLang = $this->model('sampleModel')->getOneData('langs', ['DefaultLang' => 1]);
                if (!empty($defaultLang)) {
                    if ($this->utils->checkLangTranslateDir($defaultLang['Url'])) {
                        $this->session->createSession(['lang' => $defaultLang['Url']]);
                    } else {
                        $this->session->createSession(['lang' => DEFAULT_LANG_ISNULL]);
                    }
                } else {
                    $this->session->createSession(['lang' => DEFAULT_LANG_ISNULL]);
                }
            }
        }
    }

    public function view($theme, $file, $params = [], $isIncFiles = true)
    {

        $theme = 'themes/' . $theme;
        if (file_exists(VIEW_PATH . $theme . '/' . $file . '.php')) {
            if ($isIncFiles) {
                if (DEBUG) {
                    $this->error->renderHead();
                }
                require_once VIEW_PATH . $theme . '/inc/header.php';
            }
            if (file_exists(VIEW_PATH . $theme . '/' . $file . '.php')) {
                require_once VIEW_PATH . $theme . '/' . $file . '.php';
            } else {
                header("HTTP/1.0 404 Not Found");
                $this->error->setMessage('Theme: ' . $theme . ' File: ' . $file . ' Not Found');
            }
            if ($isIncFiles) {
                if (DEBUG) {
                    $this->error->renderFoot();
                }
                require_once VIEW_PATH . $theme . '/inc/footer.php';
            }
        } else {
            header("HTTP/1.0 404 Not Found");
            echo '404 Not Found';
            if (DEBUG) {
                $this->error->setMessage('Theme: ' . $theme . ' File: ' . $file . ' Not Found');
                $this->error->renderHead();
                $this->error->renderFoot();
            }
        }
    }

    public function model($file)
    {
        if (file_exists(MODEL_PATH . $file . '.php')) {
            require_once MODEL_PATH . $file . '.php';
            if (stripos($file, '/')) {
                $file = explode('/', $file);
                $file = end($file);
            }
            if (class_exists($file)) {
                return new $file;
            } else {
                header("HTTP/1.0 404 Not Found");
                exit('404 Not Found');
            }
        } else {
            header("HTTP/1.0 404 Not Found");
            exit('404 Not Found');
        }
    }
}
