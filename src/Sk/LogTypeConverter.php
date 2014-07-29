<?php

namespace Sk;

use \Psr\Log\LogLevel;

class LogTypeConverter extends LogLevel
{
    const EMERGENCY_INT = 7;
    const ALERT_INT = 6;
    const CRITICAL_INT = 5;
    const ERROR_INT = 4;
    const WARNING_INT = 3;
    const NOTICE_INT = 2;
    const INFO_INT = 1;
    const DEBUG_INT = 0;

    public function toInt($logType)
    {
        return 1;
    }

    public function toString()
    {
        return '';
    }
}