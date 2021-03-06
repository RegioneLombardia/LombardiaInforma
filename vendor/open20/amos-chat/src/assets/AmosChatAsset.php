<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\chat
 * @category   CategoryName
 */

namespace open20\amos\chat\assets;

use yii\web\AssetBundle;
use open20\amos\core\widget\WidgetAbstract;

/**
 * Class AmosChatAsset
 * @package open20\amos\chat\assets
 */
class AmosChatAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/open20/amos-chat/src/assets/web';

    /**
     * @var array
     */
    public $css = [
        'less/chat.less',
        'less/chat-assistance.less'
    ];

    /**
     * @var array
     */
    public $js = [
        'js/amos_chat.js',
        'js/amos_chat_conversations.js',
        'js/amos_chat_messages.js',
        'js/amos_chat_user_contacts.js',
        'js/amos_chat_forward_message.js',
    ];

    /**
     * @var array
     */
    public $depends = [
    ];

    public function init()
    {
        $moduleL = \Yii::$app->getModule('layout');

        if(!empty(\Yii::$app->params['dashboardEngine']) && \Yii::$app->params['dashboardEngine'] == WidgetAbstract::ENGINE_ROWS){
            $this->css = ['less/chat.less','less/chat-assistance-fullsize.less'];
        }

        if(!empty($moduleL)){
            $this->depends [] = 'open20\amos\layout\assets\BaseAsset';
        }else{
            $this->depends [] = 'open20\amos\core\views\assets\AmosCoreAsset';
        }
        parent::init(); // TODO: Change the autogenerated stub
    }
}