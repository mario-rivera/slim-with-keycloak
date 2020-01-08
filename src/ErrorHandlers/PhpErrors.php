<?php
namespace SlimApp\ErrorHandlers;

class PhpErrors
{
    public static function enable()
    {
        set_error_handler([self::class, 'handleError']);
        set_exception_handler([self::class, 'handleUncaughtException']);
    }

    public static function handleError(int $errno, string $errstr)
    {
        switch($errno){

            case E_ERROR:
            case E_CORE_ERROR: 
            case E_COMPILE_ERROR:
            case E_USER_ERROR:
            default:
                die($errstr);
                break;
        }
    }

    public static function handleUncaughtException($e)
    {
        die($e->getMessage());
    }
}