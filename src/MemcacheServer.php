<?php

namespace App;


class MemcacheServer
{
    protected static string $host = '127.0.0.1';
    protected static int $port = 11211;
    protected static MemcacheServer $instance;
    protected \Memcache $conn;

    protected function __construct()
    {

    }

    public static function getInstance(): MemcacheServer
    {
        if (!isset(self::$instance)) {
            self::$instance = new MemcacheServer;
            self::$instance->conn = new \Memcache;
            self::$instance->conn->connect(self::$host, self::$port);
        }
        return self::$instance;
    }

    public static function getConn(): \Memcache
    {
        return self::getInstance()->conn;
    }

    protected function __clone() 
    {

    }
}