<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */

namespace humhub\modules\subscriptions\models;

use Yii;
use \yii\base\Model;

class SnippetModuleSettings extends Model
{

    /**
     * @var int maximum amount of shown users
     */
    public $mySubscribersSnippetMaxItems = 23;

    /**
     * @var int defines the snippet widgets sort order
     */
    public $mySubscribersSnippetSortOrder = 100;


    public function init()
    {
        $module = Yii::$app->getModule('subscriptions');
        $this->mySubscribersSnippetMaxItems = $module->settings->get('mySubscribersSnippetMaxItems', $this->mySubscribersSnippetMaxItems);
        $this->mySubscribersSnippetSortOrder = $module->settings->get('mySubscribersSnippetSortOrder', $this->mySubscribersSnippetSortOrder);
    }

    /**
     * Static initializer
     * @return \self
     */
    public static function instantiate()
    {
        return new self;
    }

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            ['mySubscribersSnippetMaxItems',  'number', 'min' => 1, 'max' => 30],
            ['mySubscribersSnippetSortOrder',  'number', 'min' => 0],
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributeLabels()
    {
        return [
            'mySubscribersSnippetMaxItems' => Yii::t('SubscriptionsModule.base', 'Max user items'),
            'mySubscribersSnippetSortOrder' => Yii::t('SubscriptionsModule.base', 'Sort order'),
        ];
    }

    public function save()
    {
        if(!$this->validate()) {
            return false;
        }

        $module = Yii::$app->getModule('subscriptions');
        $module->settings->set('mySubscribersSnippetMaxItems', $this->mySubscribersSnippetMaxItems);
        $module->settings->set('mySubscribersSnippetSortOrder', $this->mySubscribersSnippetSortOrder);
        return true;
    }
}
