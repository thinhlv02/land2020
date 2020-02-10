<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Webconfig
{
    function __construct()
    {
    }

    function init()
    {
        $config = &load_class('Config', 'core1212');

        $mobileDetect = &load_class('MobileDetect', 'libraries');
        $config->config['isMobile'] = $mobileDetect->isMobile();
        $config->config['isTablet'] = $mobileDetect->isTablet();

        $config->config['template_folder_root'] = '';
//        pc or mobile
        if ($config->config['isMobile'] || $config->config['isTablet'])
        {
            $config->config['template_folder_root'] .= 'pc/';
        }
        else
        {
            $config->config['template_folder_root'] = 'pc/';
        }

    }
}