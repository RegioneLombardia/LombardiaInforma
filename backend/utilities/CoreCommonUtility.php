<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\core\utilities
 * @category   CategoryName
 */

namespace backend\utilities;

use open20\amos\core\migration\libs\common\MigrationCommon;
use yii\log\Logger;

/**
 * Class CoreCommonUtility
 * @package open20\amos\core\utilities
 */
class CoreCommonUtility
{
    /**
     * This method is useful to check if the user is viewing a platform from headquarter or from another place.
     * Useful to enable offline mode only for other places, see login standard form from only main headquarter
     * or other functionalities. It return true if the user is in main headquarter. False otherwise.
     * @return bool
     */
    public static function platformSeenFromHeadquarter()
    {
        if (isset(\Yii::$app->params['seeLoginFormAllowedIpsRemoteAddr'])) {
            $val = \Yii::$app->params['seeLoginFormAllowedIpsRemoteAddr'];
        } else {
            $val = 'REMOTE_ADDR';
        }

        return (
            isset(\Yii::$app->params['seeLoginFormAllowedIps']) &&
            is_array(\Yii::$app->params['seeLoginFormAllowedIps']) &&
            !empty(\Yii::$app->params['seeLoginFormAllowedIps']) &&
            in_array($_SERVER[$val], \Yii::$app->params['seeLoginFormAllowedIps'])
        );
    }
    
    /**
     * This method add an error message for each type of application, console or web.
     * @param string $errorMsg
     */
    public static function printErrorMessage($errorMsg)
    {
        if (\Yii::$app instanceof \yii\web\Application) {
            \Yii::$app->getSession()->addFlash('danger', $errorMsg);
        } elseif (\Yii::$app instanceof \yii\console\Application) {
            MigrationCommon::printConsoleMessage($errorMsg);
        } else {
            \Yii::getLogger()->log($errorMsg, Logger::LEVEL_ERROR);
        }
    }
}
