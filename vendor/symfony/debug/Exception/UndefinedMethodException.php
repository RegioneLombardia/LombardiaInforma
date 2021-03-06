<?php

/*
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 */

namespace Symfony\Component\Debug\Exception;

/**
 * Undefined Method Exception.
 *
 */
class UndefinedMethodException extends FatalErrorException
{
    public function __construct($message, \ErrorException $previous)
    {
        parent::__construct(
            $message,
            $previous->getCode(),
            $previous->getSeverity(),
            $previous->getFile(),
            $previous->getLine(),
            null,
            true,
            null,
            $previous->getPrevious()
        );
        $this->setTrace($previous->getTrace());
    }
}
