<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$config[] = array();

// excel library path
//define('PHPEXCEL_LIB_PATH', 'application/libraries/Classes/');
//to use
///ex:
/*require_once(PHPEXCEL_LIB_PATH.'PHPExcel.php');
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();*/

// mpdf lib path
//define('MPDF_LIB_PATH', 'app/app_v3.1.4/libraries/mpdf/');
// khi day len server se config = rong
//$config['cf_upload_local'] = 'images/upload';
$config['cf_upload_local'] = '';

$config['LST_SERVER'] = array(
    '1' => array(
        'main' => 'main',
        'logs' => 'logs',
        'name' => 'Server 1',
    ),
    '2' => array(
        'main' => 'main_2',
        'logs' => 'logs_2',
        'name' => 'Server 2',
    )

);

$config['device_type'] = array(
    '1' => 'Laptop',
    '2' => 'PC',
    '3' => 'Mobile',
    '4' => 'Thẻ sim',
    '5' => 'Khác'

);
//1: laptop: 2:pc; 3: mobile; 4: khác

//ads type
$config['ads_type'] = array(
    '1' => 'Nhà đất bán',
    '2' => 'Nhà đất cho thuê',
    '3' => 'Nhà đất cần mua',
    '4' => 'Nhà đất cần thuê'
);

$config['serving_email'] = 'noreply@adclick.vn';

$config['serving_email_name'] = array('vietnamese' => 'Admarket', 'english' => 'Admarket');

/**
 * Define Maintenance Config
 */

/*
|--------------------------------------------------------------------------
| Maintenance Mode
|--------------------------------------------------------------------------
|
| For whatever reason sometimes a site needs to be taken offline.
| Set $config['maintenance_mode'] to TRUE if the site has to be offline
|
| $config['maintenance_mode'] = TRUE; // site is offline
| $config['maintenance_mode'] = FALSE; // site is online
*/
$config['maintenance_mode'] = false;