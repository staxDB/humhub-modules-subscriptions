<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */
/* @var $this yii\web\View */
/* @var $model \humhub\modules\subscriptions\models\SnippetModuleSettings */

use yii\widgets\ActiveForm;
use \yii\helpers\Html;
?>

<div class="panel panel-default">

    <div class="panel-heading"><?= Yii::t('SubscriptionsModule.base', '<strong>Task</strong> module configuration'); ?></div>

    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        
        <h4>
            <?= Yii::t('SubscriptionsModule.base', 'Your tasks snippet'); ?>
        </h4>
        
        <div class="help-block">
            <?= Yii::t('SubscriptionsModule.base', 'Shows a widget with tasks on the dashboard where you are assigned/responsible.') ?>
        </div>
        
        <?= $form->field($model, 'myTasksSnippetShow')->checkbox(); ?>

        <div class="help-block">
            <?= Yii::t('SubscriptionsModule.base', 'Shows the widget also on the dashboard of spaces.') ?>
        </div>

        <?= $form->field($model, 'myTasksSnippetShowSpace')->checkbox(); ?>

        <?= $form->field($model, 'myTasksSnippetMaxItems')->input('number', ['min' => 1, 'max' => 30]) ?>
        <?= $form->field($model, 'myTasksSnippetSortOrder')->input('number', ['min' => 0]) ?>

        <hr>

        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'data-ui-loader' => '']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
