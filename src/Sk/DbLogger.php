<?php

namespace Sk;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

/**
 * DbLogger
 */
class DbLogger extends AbstractLogger implements LoggerInterface
{

    /**
     * getPdo
     *
     * @return object pdo instance
     */
    public function getPdo()
    {

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
        return true;
    }
}