<?php

namespace Liloi\Rune\Exceptions;

class IncorrectException extends RuneException
{
    /**
     * Exception message.
     *
     * @var string
     */
    protected $defaultMessage = 'Incorrect RID exception.';

    /**
     * Exception code.
     *
     * @var int|string
     */
    protected $defaultCode = 0x103;
}