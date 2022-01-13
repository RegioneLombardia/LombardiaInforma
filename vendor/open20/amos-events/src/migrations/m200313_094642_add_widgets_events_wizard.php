<?php
use open20\amos\core\migration\AmosMigrationWidgets;
use open20\amos\dashboard\models\AmosWidgets;


/**
* Class m190403_180342_add_amos_widgets_events*/
class m200313_094642_add_widgets_events_wizard extends AmosMigrationWidgets
{
    const MODULE_NAME = 'events';

    /**
    * @inheritdoc
    */
    protected function initWidgetsConfs()
    {
        $this->widgets = [
            [
                'classname' => \open20\amos\events\widgets\icons\WidgetIconManageEvents::className(),
                'type' => AmosWidgets::TYPE_ICON ,
                'module' => self::MODULE_NAME,
                'status' => AmosWidgets::STATUS_ENABLED,
                'dashboard_visible' => 1,
                
            ],
            [
                'classname' => \open20\amos\events\widgets\icons\WidgetIconManageAllEvents::className(),
                'type' => AmosWidgets::TYPE_ICON ,
                'module' => self::MODULE_NAME,
                'status' => AmosWidgets::STATUS_ENABLED,
                'dashboard_visible' => 1,
            ]
        ];
    }
}
