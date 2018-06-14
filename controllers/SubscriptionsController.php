<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2016 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\subscriptions\controllers;

use Yii;
use humhub\modules\user\models\Follow;
use humhub\modules\user\widgets\UserListBox;
use humhub\components\behaviors\AccessControl;
use humhub\modules\content\components\ContentContainerController;

/**
 * SubscriptionsController is the main controller for showing up subscriptions-list.
 *
 * @author davidborn
 */
class SubscriptionsController extends ContentContainerController
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'acl' => [
                'class' => AccessControl::className(),
            ]
        ];
    }

    /**
     * Returns an user list which are space subscribers
     */
    public function actionSubscribersList()
    {
        $title = Yii::t('SubscriptionsModule.base', "<strong>Subscribers</strong>");

        return $this->renderAjaxContent(UserListBox::widget([
                            'query' => Follow::getFollowersQuery($this->getSpace())->visible(),
                            'title' => $title
        ]));
    }

}

?>
