<?php

namespace luya\admin\assets;

/**
 * Main Asset contains all administration area depending files and should be a dependency for all other assets.
 *
 * @since 1.0.0
 */
class Main extends \luya\web\Asset
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@admin/resources';

    /**
     * @inheritdoc
     */
    public $css = [
        'dist/main.css'
    ];

    /**
     * @inheritdoc
     */
    public $js = [
        'dist/bower.js',
        'dist/main.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'luya\admin\assets\Jquery',
    ];

    /**
     * @inheritdoc
     */
    public $publishOptions = [
        'except' => [
            'node_modules/',
        ]
    ];
}
