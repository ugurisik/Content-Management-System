<?php

use MysqliDb as DB;

class Model
{
    public $db;

    public function __construct()
    {
        $this->db = new DB(
            array(
                'host' => DB_HOST,
                'username' => DB_USER,
                'password' => DB_PASS,
                'db' => DB_NAME,
                'port' => DB_PORT,
                'charset' => DB_CHARSET,
                'prefix' => DB_PREFIX
            )
        );
    }
}
