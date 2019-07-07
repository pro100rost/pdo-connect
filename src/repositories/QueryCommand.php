<?php

namespace pro100rost\pdo\src\repositories;

use pro100rost\pdo\src\exceptions\NotFoundHttpException;
use pro100rost\pdo\src\services\ErrorRecord;

class QueryCommand
{
    /** @var Repository */
    private $repository;

    public function __construct()
    {
        $this->repository = new Repository();
    }

    /**
     * @param string $query
     *
     * @return array
     */
    public function select(string $query): array
    {
        $pdoStatement = $this->repository->getPdo()->prepare($query);

        try {
            if (!$pdoStatement->execute()) {
                throw new NotFoundHttpException('Data not found in DB');
            }
        } catch (NotFoundHttpException $e) {
            (new ErrorRecord())->recordError($e->getMessage());
        }

        return $pdoStatement->fetchAll();
    }

    /**
     * @param string $query
     */
    public function insert(string $query): void
    {
        try {
            if (!$this->repository->getPdo()->exec($query)) {
                throw new NotFoundHttpException('Table not found in DB');
            }
        } catch (NotFoundHttpException $e) {
            (new ErrorRecord())->recordError($e->getMessage());
        }
    }

    /**
     * @param string $query
     *
     * @return array
     */
    public function update(string $query): array
    {
        $pdoStatement = $this->repository->getPdo()->prepare($query);

        try {
            if (!$pdoStatement->execute()) {
                throw new NotFoundHttpException('Nothing to update in DB');
            }
        } catch (NotFoundHttpException $e) {
            (new ErrorRecord())->recordError($e->getMessage());
        }

        return $pdoStatement->fetchAll();
    }

    /**
     * @param string $query
     *
     * @return array
     */
    public function delete(string $query): array
    {
        $pdoStatement = $this->repository->getPdo()->prepare($query);

        try {
            if (!$pdoStatement->execute()) {
                throw new NotFoundHttpException('Data does not exist in DB');
            }
        } catch (NotFoundHttpException $e) {
            (new ErrorRecord())->recordError($e->getMessage());
        }

        return $pdoStatement->fetchAll();
    }
}