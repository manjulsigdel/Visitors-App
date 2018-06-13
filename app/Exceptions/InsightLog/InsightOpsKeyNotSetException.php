<?php

namespace App\Exceptions\InsightLog;

/**
 * Class FcmKeyNotSetException
 * @package App\Exceptions\InsightLog
 */
    class InsightOpsKeyNotSetException extends \Exception
{
    const MESSAGE = 'InsightOps Key not set in environment';

    /**
     * FcmKeyNotSetException constructor.
     */
    public function __construct()
    {
        parent::__construct(self::MESSAGE);
    }
}
