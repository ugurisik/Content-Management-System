<?php

namespace App\helpers\errors;

class error
{
    public $dRender;
    public $dBar;
    public function __construct($d_bar)
    {
        $debugbarRenderer = $d_bar->getJavascriptRenderer()->setBaseUrl(SITE_URL . '/vendor/maximebf/debugbar/src/DebugBar/Resources/');
        $this->dBar = $d_bar;
        $this->dRender = $debugbarRenderer;
    }
    public function renderHead()
    {
        echo $this->dRender->renderHead();
    }
    public function renderFoot()
    {
        echo $this->dRender->render();
    }
    public function setMessage($message)
    {
        $this->dBar["messages"]->addMessage($message);
    }

    public function setException($exception)
    {
        $this->dBar["exceptions"]->addException($exception);
    }

    public function setAlert($alert)
    {
        $this->dBar["alerts"]->addAlert($alert);
    }

    public function setQuery($query)
    {
        $this->dBar["queries"]->addQuery($query);
    }

    public function setRoute($route)
    {
        $this->dBar["routes"]->addRoute($route);
    }

    // public function setTimeline($timeline)
    // {
    //     $this->dRender["time"]->addMeasure($timeline);
    // }




    static function catch($obj, $status = 500)
    {
        $error = [
            "message" => "Error Message: " . $obj->getMessage(),
            "file_line" => "Error File: " . $obj->getFile() . " Line: " . $obj->getLine(),
            "trace" => $obj->getTraceAsString(),
            "type" => get_class($obj),
            "code" => $obj->getCode(),
            "status" => $status
        ];
        require_once "app/views/Errors.php";
    }
}
