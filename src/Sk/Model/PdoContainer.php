<?php

namespace Sk\Model;

/**
 * PdoContainer
 */
class PdoContainer
{
    /**
     * $pdo
     *
     * @var object
     */
    protected $pdo;

    /**
     * Construct
     *
     * @param string $pdoDsn
     * @param string $pdoLogin
     * @param string $pdoPass
     */
    public function __construct($pdoDsn, $pdoLogin, $pdoPass)
    {
        $this->pdo = new \PDO($pdoDsn, $pdoLogin, $pdoPass);
    }

    /**
     * exec
     *
     * @param string $sql
     * @param array $placeholders
     * @throws \InvalidArgumentException
     * @return object execute result
     */
    public function exec($sql, array $placeholders)
    {
        if (!is_string($sql)) {
            throw new \InvalidArgumentException('Provided SQL not a string');
        }

        $statement = $this->pdo->prepare($sql);
        $statement->execute($placeholders);
        return $statement;
    }
}