<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */

namespace humhub\modules\subscriptions;

use Yii;
use yii\base\BaseObject;
use humhub\modules\subscriptions\models\SnippetModuleSettings;
use humhub\modules\subscriptions\widgets\Subscribers;
use humhub\modules\subscriptions\permissions\ViewWidget;


/*
 * @var $user \humhub\modules\user\models\User
 * @author David Born ([staxDB](https://github.com/staxDB))
 */

class Events extends BaseObject
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
