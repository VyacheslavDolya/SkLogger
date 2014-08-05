<?php

namespace SkLogger\Traits;

use Psr\Log\LoggerInterface;

/**
 * LoggerTrait
 *
 * @package SkLogger
 * @subpackage Trait
 * @author Vyacheslav Dolya <vyacheslav.dolya@gmail.com>
 */
trait LoggerTrait
{

    /**
     * Logger Container
     *
     * @var object
     */
    protected $logger;

    /**
     * Set Logger
     *
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Get Logger
     *
     * @return object
     * @throws \InvalidArgumentException
     */
    public function getLogger()
    {
        if ($this->logger === null) {
            throw new \InvalidArgumentException('invalid logger value');
        }

        return $this->logger;
    }
}