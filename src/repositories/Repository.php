<?php

namespace pro100rost\pdo\src\repositories;

use pro100rost\pdo\src\services\ConfigParser;
use pro100rost\pdo\src\services\ErrorRecord;

class Repository
{
    /** @var \PDO */
    private $pdo;
    /** @var ConfigParser */
    private $config;
    /** @var ErrorRecord */
    private $error;

    /**
     * Repository constructor.
     */
    public function __construct()
    {
        try {
            $this->error = new ErrorRecord();
            $this->config = new ConfigParser();
            $this->pdo = new \PDO($this->config->getPdoDSN(), $this->config->getUsername(), $this->config->getPassword());
        } catch (\PDOException $exception) {
            $this->error->recordError('Connect to DB failed: ' . $exception->getMessage());
        } catch (\Throwable $error) {
            $this->error->recordError($error->getMessage());
        }
    }

    /**
     * @return \PDO
     */
    public function getPdo(): \PDO
    {
        return $this->pdo;
    }
}