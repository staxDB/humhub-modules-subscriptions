<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2016 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\subscriptions\permissions;

use Yii;
use humhub\libs\BasePermission;
use humhub\modules\space\models\Space;

/**
 * ViewBookmarkStream Permission
 */
class ViewWidget extends BasePermission
{

    /**
     * @inheritdoc
     */
    public $defaultAllowedGroups = [
        Space::USERGROUP_OWNER,
        Space::USERGROUP_ADMIN,
        Space::USERGROUP_MODERATOR
    ];

    /**
     * @inheritdoc
     */
    protected $fixedGroups = [
        Space::USERGROUP_USER
    ];

    /**
     * @inheritdoc
     */
    public function __construct($config = array())
    {
        parent::__construct($config);
        $this->title = Yii::t('SubscriptionsModule.base', 'Show the sidebar widget');
        $this->description = Yii::t('SubscriptionsModule.base', 'Allows users to view the sidebar widget.');
    }

    /**
     * @inheritdoc
     */
    protected $title;

    /**
     * @inheritdoc
     */
    protected $description;

    /**
     * @inheritdoc
     */
    protected $moduleId = 'subscriptions';

}
