<?php
/**
 * @license
 * Copyright 2018 TruongLuu. All Rights Reserved.
 */

namespace Truonglv\Censorship;

use XF\Entity\User;
use XF\Mvc\Entity\Entity;

class Listener
{
    public static function onEntityStructure(\XF\Mvc\Entity\Manager $em, \XF\Mvc\Entity\Structure &$structure)
    {
        $structure->columns['tl_censorship_enabled'] = ['type' => Entity::BOOL, 'default' => true];
    }

    public static function isDisabledCensor(User $user = null)
    {
        $user = $user ?: \XF::visitor();

        if (!$user->user_id) {
            return false;
        }

        if (!$user->hasPermission('general', 'tlCensorship_canOnOff')) {
            return false;
        }

        return !$user->Option->tl_censorship_enabled;
    }
}
