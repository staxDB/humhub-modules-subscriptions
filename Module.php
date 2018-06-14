<?php

namespace humhub\modules\subscriptions;

use Yii;
use yii\helpers\Url;
use humhub\modules\space\models\Space;
use humhub\modules\content\components\ContentContainerActiveRecord;
use humhub\modules\content\components\ContentContainerModule;

class Module extends ContentContainerModule
{
    /**
     * @inheritdoc
     */
//    public $resourcesPath = 'resources';

    /**
     * @inheritdoc
     */
    public function getContentContainerTypes()
    {
        return [
            Space::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function disable()
    {
        parent::disable();
    }

    /**
     * @inheritdoc
     */
    public function disableContentContainer(ContentContainerActiveRecord $container)
    {
        parent::disableContentContainer($container);
    }

    public function getName()
    {
        return Yii::t('SubscriptionsModule.base', 'Subscriptions');
    }

    public function getDescription()
    {
        return Yii::t('SubscriptionsModule.base', 'Adds a snippet for showing up subscribers.');
    }

    /**
     * @inheritdoc
     */
    public function getContentContainerName(ContentContainerActiveRecord $container)
    {
        return Yii::t('SubscriptionsModule.base', 'Subscriptions');
    }

    /**
     * @inheritdoc
     */
    public function getContentContainerDescription(ContentContainerActiveRecord $container)
    {
        return Yii::t('SubscriptionsModule.base', 'Adds a snippet for showing up subscribers.');
    }

    public function getConfigUrl()
    {
        return Url::to([
            '/subscriptions/config'
        ]);
    }

//    public function getContentContainerConfigUrl(ContentContainerActiveRecord $container)
//    {
//        return $container->createUrl('/subscriptions/container-config');
//    }
}
