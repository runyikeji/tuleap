<?php
//
// SourceForge: Breaking Down the Barriers to Open Source Development
// Copyright 1999-2000 (c) The SourceForge Crew
// http://sourceforge.net
//
// $Id$

require($DOCUMENT_ROOT.'/include/pre.php');    
require($DOCUMENT_ROOT.'/project/admin/project_admin_utils.php');

$LANG->loadLanguageMsg('project/project');

session_require(array('group'=>$group_id,'admin_flags'=>'A'));

project_admin_header(array('title'=>$LANG->getText('project_admin_history','proj_history'),'group'=>$group_id));

echo $LANG->getText('project_admin_history','proj_change_log');

echo show_grouphistory($group_id);

project_admin_footer(array());
?>
