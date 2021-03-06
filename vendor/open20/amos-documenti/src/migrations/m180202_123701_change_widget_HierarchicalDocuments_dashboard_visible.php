<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\documenti\migrations
 * @category   CategoryName
 */

use open20\amos\core\migration\AmosMigrationWidgets;

/**
 * Class m180202_123701_change_widget_HierarchicalDocuments_dashboard_visible
 */
class m180202_123701_change_widget_HierarchicalDocuments_dashboard_visible extends AmosMigrationWidgets
{
    const MODULE_NAME = 'documenti';

    /**
     * @inheritdoc
     */
    protected function initWidgetsConfs()
    {
        $this->widgets = [
            [
                'classname' => \open20\amos\documenti\widgets\graphics\WidgetGraphicsHierarchicalDocuments::className(),
                'dashboard_visible' => 0,
                'update' => true
            ]
        ];
    }
}
