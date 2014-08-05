<?php

namespace SkLogger\Component;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

/**
 * DbLogger
 *
 * @package SkLogger
 * @subpackage DbLogger
 * @author Vyacheslav Dolya <vyacheslav.dolya@gmail.com>
 */
class DbLogger extends AbstractLogger implements LoggerInterface
{

    /**
     * Container for Pdo
     *
     * @var object
     */
    private $pdoContainer;

    /**
     * Get table name.
     *
     * @return string
     */
    private function getTable()
    {
        return 'log';
    }

    /**
     * Set Pdo Container
     *
     * @param object $pdoContainer
     */
    public function setPdoContainer($pdoContainer)
    {
        $this->pdoContainer = $pdoContainer;
    }

    /**
     * Get Pdo Container
     *
     * @throws \InvalidArgumentException
     * @return object Pdo container instance.
     */
    private function getPdoContainer()
    {
        if ($this->pdoContainer === null || !is_object($this->pdoContainer)) {
            throw new \InvalidArgumentException('invalid pdoContainer');
        }

        return $this->pdoContainer;
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return boolean
     */
    public function log($level, $message, array $context = array())
    {
        $values = array(
            ':id' => null,
            ':level' => $this->getLevelIdByString($level),
            ':message' => $message,
            ':data' => json_encode($context),
            ':createdAt' => microtime(true),
        );

        $sql = "INSERT INTO " . $this->getTable() .
            " VALUES (:id, :level, :message, :data, :createdAt);";

        $this->getPdoContainer()->exec($sql, $values);
    }
}