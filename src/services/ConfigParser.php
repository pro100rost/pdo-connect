<?php

namespace pro100rost\pdo\src\services;

class ConfigParser
{
    private $ini;

    public function __construct()
    {
        $this->ini = parse_ini_file(__DIR__ . '/../../../../../config.ini');
    }

    /**
     * @param string $parameter
     *
     * @return string
     */
    public function getIniContent(string $parameter): string
    {
        return $this->ini[$parameter] ?? '';
    }

    /**
     * @return string
     */
    public function getPdoDSN(): string
    {
        $pdoDBMS = $this->getIniContent('dbms');
        $pdoHost = $this->getIniContent('db_host');
        $pdoDataBaseName = $this->getIniContent('db_name');

        return $pdoDBMS . ':host=' . $pdoHost . ';dbname=' . $pdoDataBaseName;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->getIniContent('db_username');
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->getIniContent('db_password');
    }
}