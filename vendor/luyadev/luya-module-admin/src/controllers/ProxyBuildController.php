<?php

namespace luya\admin\controllers;

/**
 * Proxy Build Controller.
 *
 * @since 1.0.0
 */
class ProxyBuildController extends \luya\admin\ngrest\base\Controller
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'luya\admin\models\ProxyBuild';

    /**
     * {@inheritDoc}
     */
    public $clearButton = true;
}
