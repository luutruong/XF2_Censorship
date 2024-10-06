<?php
/**
 * @license
 * Copyright 2018 TruongLuu. All Rights Reserved.
 */

namespace Truonglv\Censorship\XF\Pub\Controller;

class AccountController extends XFCP_AccountController
{
    protected function preferencesSaveProcess(\XF\Entity\User $visitor)
    {
        $form = parent::preferencesSaveProcess($visitor);

        if ($visitor->hasPermission('general', 'tlCensorship_canOnOff')) {
            $input = $this->filter([
                'option' => [
                    'tl_censorship_enabled' => 'bool'
                ]
            ]);

            $userOptions = $visitor->getRelationOrDefault('Option');
            $form->setupEntityInput($userOptions, [
                'tl_censorship_enabled' => !$input['option']['tl_censorship_enabled']
            ]);
        }

        return $form;
    }
}
