<?php

use humhub\modules\space\widgets\Sidebar as SpaceSidebar;
use humhub\modules\subscriptions\Module;
use humhub\modules\subscriptions\Events;

return array(
    'id' => 'subscriptions',
    'class' => Module::class,
    'namespace' => 'humhub\modules\subscriptions',
    'events' => [
        ['class' => SpaceSidebar::class, 'event' => SpaceSidebar::EVENT_INIT, 'callback' => [Events::class, 'onSpaceSidebarInit']],
    ]
);
?>