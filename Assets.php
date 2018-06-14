<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */

namespace humhub\modules\subscriptions\assets;

use yii\web\AssetBundle;

class Assets extends AssetBundle
{
    public $css = [
        'subscriptions.css',
    ];
    public $js = [
        'subscriptions.js'
    ];

    public function init()
    {
        $this->sourcePath = dirname(__FILE__) . '/assets';
        parent::init();
    }
}
