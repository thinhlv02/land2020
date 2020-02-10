<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
/** add by thinhlv */

$hook['pre_controller'] = array(
    'class' => 'Webconfig',
    'function' => 'init',
    'filename' => 'Webconfig.php',
    'filepath' => 'hooks',
    'params' => array('beer', 'wine', 'snacks')
);

/**
 * Defining Maintenance Hook
 */
$hook['pre_system'][] = array(
    'class' => 'maintenance_hook',
    'function' => 'offline_check',
    'filename' => 'maintenance_hook.php',
    'filepath' => 'hooks'
);