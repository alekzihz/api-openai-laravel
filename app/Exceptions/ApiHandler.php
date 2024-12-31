<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class ApiHandler
{
    protected static $errorCodes = [
        '400' => 'Bad Request',
        '401' => 'Unauthorized',
        '403' => 'Forbidden',
        '404' => 'Not Found',
        '405' => 'Method Not Allowed',
        '500' => 'Internal Server Error',
    ];

    public static function getError($statusCode)
    {
        return self::$errorCodes[$statusCode];
    }
}
