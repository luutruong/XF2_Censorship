<?php

namespace Truonglv\Censorship;

use XF\AddOn\AbstractSetup;
use XF\AddOn\StepRunnerInstallTrait;
use XF\AddOn\StepRunnerUpgradeTrait;
use XF\AddOn\StepRunnerUninstallTrait;

class Setup extends AbstractSetup
{
    use StepRunnerInstallTrait;
    use StepRunnerUpgradeTrait;
    use StepRunnerUninstallTrait;

    public function installStep1()
    {
        try {
            $this->query("ALTER TABLE xf_user_option
                ADD COLUMN tl_censorship_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '1'");
        } catch (\XF\Db\Exception $e) {
        }
    }

    public function uninstallStep1()
    {
        try {
            $this->query('ALTER TABLE xf_user_option DROP COLUMN tl_censorship_enabled');
        } catch (\XF\Db\Exception $e) {
        }
    }
}
