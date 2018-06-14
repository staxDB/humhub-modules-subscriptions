<?php

use humhub\widgets\PanelMenu;
use humhub\modules\user\widgets\Image;
?>

<div class="panel panel-default subscribers" id="space-subscribers-panel">
    <?= PanelMenu::widget(['id' => 'space-subscribers-panel']); ?>
    <div class="panel-heading"><?= Yii::t('SubscriptionsModule.base', '<strong>Space</strong> subscribers'); ?> (<?= $totalMemberCount ?>)</div>
    <div class="panel-body">
        <?php foreach ($users as $user) : ?>
            <?php
                // Standard member
                echo Image::widget(['user' => $user, 'width' => 32, 'showTooltip' => true]);
            ?>
        <?php endforeach; ?>

        <?php if ($showListButton) : ?>
            <br>
            <a href="<?= $urlMembersList; ?>" data-target="#globalModal" class="btn btn-default btn-sm"><?= Yii::t('SubscriptionsModule.base', 'Show all'); ?></a>
        <?php endif; ?>

    </div>
</div>