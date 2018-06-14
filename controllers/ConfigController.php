<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */

namespace humhub\modules\subscriptions\controllers;

use Yii;
use humhub\modules\admin\permissions\ManageModules;
use humhub\modules\admin\components\Controller;
use humhub\modules\subscriptions\models\SnippetModuleSettings;

/**
 * 
 */
class ConfigController extends Controller
{
    /**
     * @inheritdoc
     */
    public function getAccessRules()
    {
        return [['permissions' => ManageModules::class]];
    }

    /**
     * Configuration action for system admins.
     */
    public function actionIndex()
    {
        $model = new SnippetModuleSettings();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->view->saved();
        }

        return $this->render('snippet', [
            'model' => $model
        ]);
    }
}
