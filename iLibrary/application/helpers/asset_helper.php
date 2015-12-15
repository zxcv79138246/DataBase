<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('asset_url')) {
    function asset_url($path = '')
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        //return the full asset path
        return base_url() . $CI->config->item('asset_path') . $path;
    }
}
