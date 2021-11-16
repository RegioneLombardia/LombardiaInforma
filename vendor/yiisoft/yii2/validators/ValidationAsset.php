<?php
/**
 */

namespace yii\validators;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the javascript files for client validation.
 *
 * @since 2.0
 */
class ValidationAsset extends AssetBundle
{
    public $sourcePath = '@yii/assets';
    public $js = [
        'yii.validation.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
