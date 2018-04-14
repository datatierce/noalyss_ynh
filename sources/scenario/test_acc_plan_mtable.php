<?php

/*
 *   This file is part of NOALYSS.
 *
 *   PhpCompta is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   PhpCompta is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with PhpCompta; if not, write to the Free Software
 *   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */
// Copyright (2016) Author Dany De Bontridder <dany@alchimerys.be>

if (!defined('ALLOWED'))
    die('Appel direct ne sont pas permis');
 //@description:Test the class Acc_Plan_mtable , ajax and javascript

 $_GET=array (
);
$_POST=array (
);
$_POST['gDossier']=$gDossierLogInput;
$_GET['gDossier']=$gDossierLogInput;
$_REQUEST=array_merge($_GET,$_POST);
require_once NOALYSS_INCLUDE."/class/acc_plan_mtable.class.php";
require_once NOALYSS_INCLUDE."/lib/manage_table_sql.class.php";
/**
 * @file
 * @brief Test the Acc_Plan_MTable
 */
$obj=new Acc_Plan_SQL($cn);
/**
 * Test $obj
 */

$mtable=new Acc_Plan_MTable($obj);
$obj->set_limit_fiche_qcode(5);
$mtable->set_callback("ajax_test.php");
$mtable->add_json_param("TestAjaxFile",NOALYSS_HOME."/../scenario/ajax_acc_plan_mtable.php");
$mtable->create_js_script();
echo $mtable->display_table(" where pcm_val::text like '4%' order by pcm_val::text limit 30");
