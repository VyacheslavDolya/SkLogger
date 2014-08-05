<?php

namespace SkLogger\Component;

use \Psr\Log\LogLevel;

/**
 * Converter for Logging types
 *
 * @package SkLogger
 * @subpackage LogTypeConverter
 * @author Vyacheslav Dolya <vyacheslav.dolya@gmail.com>
 */
class LogTypeConverter extends LogLevel
{
    /**
     * Equals string to int values
     *
     * @var array
     */
    protected $levels = array(
        LogLevel::DEBUG     => 0,
        LogLevel::INFO      => 1,
        LogLevel::NOTICE    => 2,
        LogLevel::WARNING   => 4,
        LogLevel::ERROR     => 5,
        LogLevel::CRITICAL  => 6,
        LogLevel::EMERGENCY => 7,
    );

    /**
     * Convert string level to int.
     *
     * @param string $level
     * @return integer
     * @throws \InvalidArgumentException
     */
    public function toInt($level)
    {
        if (isset($this->levels[$level])) {
            return $this->levels[$level];
        }

        throw  new \InvalidArgumentException('invalid string offset');
    }

    /**
     * Convert int level to string.
     *
     * @param integer $level
     * @return string
     * @throws \InvalidArgumentException
     */
    public function toString($level)
    {
        $stringLevel = array_search($level, $this->levels);

        if ($stringLevel !== false) {
            return $stringLevel;
        }

        throw  new \InvalidArgumentException('invalid int value');
    }
}