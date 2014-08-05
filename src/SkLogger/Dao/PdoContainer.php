<?php

namespace SkLogger\Dao;

/**
 * PDO Provider class.
 *
 * @package SkLogger
 * @subpackage PdoContainer
 * @author Vyacheslav Dolya <vyacheslav.dolya@gmail.com>
 */
class PdoContainer
{
    /**
     * PDO instance container
     *
     * @var object
     * @access private
     */
    private $pdo;

    /**
     * Constructor
     *
     * @param string $pdoDsn   Driver invocation.
     * @param string $pdoLogin User Name.
     * @param string $pdoPass  Password.
     */
    public function __construct($pdoDsn, $pdoLogin, $pdoPass)
    {
        $this->pdo = new \PDO($pdoDsn, $pdoLogin, $pdoPass);
    }

    /**
     * Execute sql query.
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

        if (empty($sql)) {
            throw new \InvalidArgumentException('Provided SQL is empty');
        }

        $statement = $this->pdo->prepare($sql);
        $statement->execute($placeholders);
        return $statement;
    }
}