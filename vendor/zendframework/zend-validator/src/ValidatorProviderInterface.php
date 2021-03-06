<?php
/**
 */

namespace Zend\Validator;

/**
 * Hint to the zend-modulemanager ServiceListener that a module provides validators.
 *
 * Module classes implementing this interface hint to
 * Zend\ModuleManager\ServiceListener that they provide validators for the
 * ValidatorPluginManager.
 *
 * For users of zend-mvc/zend-modulemanager v2, this poses no backwards-compatibility
 * break as the method getValidatorConfig is still duck-typed within Zend\Validator\Module
 * when providing configuration to the ServiceListener.
 */
interface ValidatorProviderInterface
{
    /**
     * Provide plugin manager configuration for validators.
     *
     * @return array
     */
    public function getValidatorConfig();
}
