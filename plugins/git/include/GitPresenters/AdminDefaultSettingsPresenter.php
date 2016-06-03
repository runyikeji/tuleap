<?php
/**
 * Copyright (c) Enalean, 2016. All Rights Reserved.
 *
 * This file is a part of Tuleap.
 *
 * Tuleap is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Tuleap is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tuleap. If not, see <http://www.gnu.org/licenses/>.
 */

class GitPresenters_AdminDefaultSettingsPresenter extends GitPresenters_AdminPresenter
{
    /**
     * @var CSRFSynchronizerToken
     */
    private $csrf;

    public $read_options;
    public $write_options;
    public $rewrite_options;
    public $mirror_presenters;
    public $are_fine_grained_permissions_defined;
    public $can_use_fine_grained_permissions;

    public function __construct(
        $project_id,
        $are_mirrors_defined,
        array $mirror_presenters,
        CSRFSynchronizerToken $csrf,
        array $read_options,
        array $write_options,
        array $rewrite_options,
        $pane_access_control,
        $pane_mirroring,
        $are_fine_grained_permissions_defined,
        $can_use_fine_grained_permissions
    ) {
        parent::__construct($project_id, $are_mirrors_defined);

        $this->manage_default_settings              = true;
        $this->mirror_presenters                    = $mirror_presenters;
        $this->pane_access_control                  = $pane_access_control;
        $this->pane_mirroring                       = $pane_mirroring;
        $this->read_options                         = $read_options;
        $this->write_options                        = $write_options;
        $this->rewrite_options                      = $rewrite_options;
        $this->csrf                                 = $csrf;
        $this->are_fine_grained_permissions_defined = $are_fine_grained_permissions_defined;
        $this->can_use_fine_grained_permissions     = $can_use_fine_grained_permissions;
    }

    public function is_control_limited()
    {
        return false;
    }

    public function default_git_access_rights()
    {
        return $GLOBALS['Language']->getText('plugin_git', 'view_admin_tab_default_access_rights');
    }

    public function csrf_token()
    {
        return $this->csrf->fetchHTMLInput();
    }

    public function default_access_rights_form_action()
    {
        return '/plugins/git/?group_id='. $this->project_id .'&action=admin-default-access-rights';
    }

    public function table_title()
    {
        return ucfirst($GLOBALS['Language']->getText('plugin_git', 'admin_mirroring'));
    }

    public function mirroring_title()
    {
        return $GLOBALS['Language']->getText('plugin_git', 'mirroring_title');
    }

    public function mirroring_info()
    {
        return $GLOBALS['Language']->getText('plugin_git', 'mirroring_default_info');
    }

    public function mirroring_mirror_name()
    {
        return $GLOBALS['Language']->getText('plugin_git', 'mirroring_mirror_name');
    }

    public function mirroring_mirror_url()
    {
        return $GLOBALS['Language']->getText('plugin_git', 'identifier');
    }

    public function mirroring_mirror_used()
    {
        return $GLOBALS['Language']->getText('plugin_git', 'mirroring_mirror_default_used');
    }

    public function mirroring_update_mirroring()
    {
        return $GLOBALS['Language']->getText('plugin_git', 'mirroring_update_default_mirroring');
    }

    public function left_tab_admin_settings()
    {
        return $GLOBALS['Language']->getText('plugin_git', 'admin_settings');
    }

    public function left_tab_admin_permissions()
    {
        return $GLOBALS['Language']->getText('plugin_git', 'view_repo_access_control');
    }

    public function left_tab_admin_notifications()
    {
        return $GLOBALS['Language']->getText('plugin_git', 'admin_mail');
    }

    public function label_read()
    {
        return $GLOBALS['Language']->getText('plugin_git', 'perm_R');
    }

    public function label_write()
    {
        return $GLOBALS['Language']->getText('plugin_git', 'perm_W');
    }

    public function label_rw()
    {
        return $GLOBALS['Language']->getText('plugin_git', 'perm_W+');
    }

    public function read_select_box_id()
    {
        return 'default_access_rights['.Git::DEFAULT_PERM_READ.']';
    }

    public function write_select_box_id()
    {
        return 'default_access_rights['.Git::DEFAULT_PERM_WRITE.']';
    }

    public function rewrite_select_box_id()
    {
        return 'default_access_rights['.Git::DEFAULT_PERM_WPLUS.']';
    }

    public function submit_default_access_rights()
    {
        return $GLOBALS['Language']->getText('plugin_git', 'admin_save_submit');
    }

    public function mirroring_href()
    {
        return "?action=admin-default-settings&group_id=$this->project_id&pane=".GitViews::DEFAULT_SETTINGS_PANE_MIRRORING;
    }

    public function access_control_href()
    {
        return "?action=admin-default-settings&group_id=$this->project_id&pane=".GitViews::DEFAULT_SETTINGS_PANE_ACCESS_CONTROL;
    }

    public function fine_grained_permissions_checkbox_label()
    {
        return $GLOBALS['Language']->getText(
            'plugin_git',
            'fine_grained_permissions_checkbox_label'
        );
    }

    public function fine_grained_permissions_warning()
    {
        return $GLOBALS['Language']->getText(
            'plugin_git',
            'fine_grained_permissions_warning'
        );
    }
}
