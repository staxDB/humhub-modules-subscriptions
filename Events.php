<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */

namespace humhub\modules\subscriptions;

use Yii;
use humhub\modules\subscriptions\models\SnippetModuleSettings;
use humhub\modules\subscriptions\widgets\Subscribers;
use humhub\modules\subscriptions\permissions\ViewWidget;


/* @var $user \humhub\modules\user\models\User */

/**
 * Created by PhpStorm.
 * User: davidborn
 * Date: 14.09.2017
 * Time: 12:12
 */
class Events
{
    public static function onSpaceSidebarInit($event)
    {
        if (Yii::$app->user->isGuest) {
            return;
        }

        $space = $event->sender->space;
        $settings = SnippetModuleSettings::instantiate();

        if ($space->isModuleEnabled('subscriptions')) {
            if ($space->permissionManager->can(ViewWidget::class)) {
                $event->sender->addWidget(Subscribers::className(), ['maxSubscribers' => $settings->mySubscribersSnippetMaxItems, 'space' => $space], ['sortOrder' => $settings->mySubscribersSnippetSortOrder]);
            }
        }
    }
}
