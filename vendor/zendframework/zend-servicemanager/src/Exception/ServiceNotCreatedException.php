<?php
/**
 */

namespace Zend\ServiceManager\Exception;

use Interop\Container\Exception\ContainerException;
use RuntimeException as SplRuntimeException;

/**
 * This exception is thrown when the service locator do not manage to create
 * the service (factory that has an error...)
 */
class ServiceNotCreatedException extends SplRuntimeException implements
    ContainerException,
    ExceptionInterface
{
}
