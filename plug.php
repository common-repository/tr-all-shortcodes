<?php
/*
Plugin Name: TR All Shortcodes
Plugin URI: http://ngoctrinh.net/
Description: List All Shortcodes, Find shortcode on post content used.
Version: 1.0.3
Author: Trinh
Author URI: http://ngoctrinh.net/
License: GPL2
*/

define('TRASC_PATH',__DIR__.'/');
define('TRASC_URL', plugins_url('/',__FILE__));

if(is_admin())
{
    include(TRASC_PATH.'inc/admin.php');
}

if(!empty($_REQUEST['tr_action']))
{
    add_action('init','trasc_plugin_init');
    function trasc_plugin_init()
    {
        include(TRASC_PATH.'inc/actions.php');
    }
}