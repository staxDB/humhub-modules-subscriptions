<?php

use humhub\modules\space\widgets\Sidebar as SpaceSidebar;

return array(
    'id' => 'subscriptions',
    'class' => 'humhub\modules\subscriptions\Module',
    'namespace' => 'humhub\modules\subscriptions',
    'events' => [
        ['class' => SpaceSidebar::class, 'event' => SpaceSidebar::EVENT_INIT, 'callback' => ['humhub\modules\subscriptions\Events', 'onSpaceSidebarInit']],
    ]
);
?>