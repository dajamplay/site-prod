<?php

namespace App\Support\Session;

class Session
{
    public const SESSION_FLASH = '_session_flash_';

    public static function flash(string $name, string $value): void
    {
        $_SESSION[self::SESSION_FLASH][$name] = $value;
    }

    public static function has(string $name): bool
    {
        return isset($_SESSION[self::SESSION_FLASH][$name]);
    }

    public static function put(): void
    {
        //TODO Create method
    }

    public static function start(): void
    {
        if (session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }
    }

    public static function get(string $name): string|null
    {
        return $_SESSION[self::SESSION_FLASH][$name] ?: null;
    }

    public static function resetFlashMessage(): void
    {
        if (isset($_SESSION[self::SESSION_FLASH])) unset($_SESSION[self::SESSION_FLASH]);
    }
}