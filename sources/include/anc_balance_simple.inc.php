<?php
//This file is part of NOALYSS and is under GPL 
//see licence.txt
/**
 *@file
 *@brief Print the  balance of 1 plan
 * @see Anc_Balance_Simple
 */
if ( ! defined ('ALLOWED') ) die('Appel direct ne sont pas permis');
require_once NOALYSS_INCLUDE.'/class/anc_balance_simple.class.php';
$bs = new Anc_Balance_Simple($cn);
$bs->get_request();
echo '<form method="get">';
echo $bs->display_form();
echo '</form>';
if (isset($_GET['result']))
{
    $result= $bs->display_html();
    if ( $bs->has_data > 0)
    {
        echo $bs->show_button();
        echo $result;
    }
 else
    {
        echo '<p class="notice">';
        echo _('Aucune donnée trouvée');
        echo '</p>';
    }
}
?>
