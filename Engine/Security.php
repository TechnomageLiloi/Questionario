<?php

namespace Liloi\Rune;

/**
 * Security manager.
 *
 * @package Rune\Engine
 */
class Security
{
    /**
     * Function: Login.
     */
    public static function login(): void
    {
        $_SESSION['pass'] = true;
    }

    /**
     * Function: Logout.
     */
    public static function logout(): void
    {
        $_SESSION['pass'] = false;
    }

    /**
     * Function: Check password session.
     *
     * @return bool `true` if admin mode, `false` is user mode.
     */
    public static function check(): bool
    {
        if(!array_key_exists('pass', $_SESSION))
        {
            return false;
        }

        return $_SESSION['pass'];
    }
}