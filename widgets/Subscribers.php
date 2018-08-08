<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2017 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\subscriptions\widgets;

use humhub\components\Widget;
use humhub\modules\user\models\Follow;
use humhub\modules\space\models\Space;

/**
 * Space Subscribers Snippet
 *
 * @author davidborn
 */
class Subscribers extends Widget
{

    /**
     * @var int maximum members to display
     */
    public $maxSubscribers;

    /**
     * @var Space the space
     */
    public $space;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $users = $this->getUserQuery()->all();

        return $this->render('subscribers', [
                    'users' => $users,
                    'showListButton' => (count($users) == $this->maxSubscribers),
                    'urlMembersList' => $this->space->createUrl('/subscriptions/subscriptions/subscribers-list'),
                    'totalMemberCount' => Follow::getFollowersQuery($this->space)->visible()->count()
        ]);
    }

    /**
     * Returns a query for members of this space
     *
     * @return \yii\db\ActiveQuery the query
     */
    protected function getUserQuery()
    {
        $query = Follow::getFollowersQuery($this->space)->active();
        $query->limit($this->maxSubscribers);
        return $query;
    }
}

?>