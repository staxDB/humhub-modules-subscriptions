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

    <div class="panel-heading"><?= Yii::t('SubscriptionsModule.base', '<strong>Subscriptions</strong> module configuration'); ?></div>

    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        
        <div class="help-block">
            <?= Yii::t('SubscriptionsModule.base', 'Edit <strong>max shown users</strong> in subscribers-list and <strong>sort order</strong> of the widget') ?>
        </div>

        <?= $form->field($model, 'mySubscribersSnippetMaxItems')->input('number', ['min' => 1, 'max' => 30]) ?>
        <?= $form->field($model, 'mySubscribersSnippetSortOrder')->input('number', ['min' => 0]) ?>

        <hr>

        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'data-ui-loader' => '']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
