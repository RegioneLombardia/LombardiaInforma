<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\core\giiamos\crud\default
 * @category   CategoryName
 */

use yii\helpers\StringHelper;
/**
 * Customizable controller class.
 */
echo "<?php\n";
?>

namespace <?= StringHelper::dirname(ltrim($generator->controllerClass, '\\')) . '\api' ?>;

/**
* This is the class for REST controller "<?= $controllerClassName ?>".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class <?= $controllerClassName ?> extends \yii\rest\ActiveController
{
public $modelClass = '<?= $generator->modelClass ?>';
<?php if ($generator->accessFilter): ?>
    /**
    * @inheritdoc
    */
    public function behaviors()
    {
    return ArrayHelper::merge(
    parent::behaviors(),
    [
    'access' => [
    'class' => AccessControl::className(),
    'rules' => [
    [
    'allow' => true,
    'matchCallback' => function ($rule, $action) {return \Yii::$app->user->can($this->module->id . '_' . $this->id . '_' . $action->id, ['route' => true]);},
    ]
    ]
    ]
    ]
    );
    }
<?php endif; ?>
}
