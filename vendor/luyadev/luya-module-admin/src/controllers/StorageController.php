<?php

namespace luya\admin\controllers;

use luya\admin\base\Controller;

/**
 * StorageController renders the Filemanager Template.
 *
 * @since 1.0.0
 */
class StorageController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
