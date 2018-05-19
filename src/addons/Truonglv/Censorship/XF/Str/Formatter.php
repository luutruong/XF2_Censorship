<?php
/**
 * @license
 * Copyright 2018 TruongLuu. All Rights Reserved.
 */

namespace Truonglv\Censorship\XF\Str;

use Truonglv\Censorship\Listener;

/**
 * Class Formatter
 * @package Truonglv\Censorship\XF\Str
 * @inheritdoc
 */
class Formatter extends XFCP_Formatter
{
    public function censorText($string, $censorChar = null)
    {
        if (Listener::isDisabledCensor()) {
            return $string;
        }

        return parent::censorText($string, $censorChar);
    }
}
