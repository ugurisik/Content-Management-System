<?php

use App\helpers\payments;

class payment extends Controller
{
    public function index(...$params)
    {
        $iyzico = new payments\iyzico;
        echo $iyzico->purchase();   
    }
}
