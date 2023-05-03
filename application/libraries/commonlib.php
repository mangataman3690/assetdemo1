<?php   if (!defined('BASEPATH')) exit('No direct script access allowed');

class Commonlib
{
  function Commonlib()
    {
      $CI =& get_instance();
      $CI->load->library('pagination');
      $CI->load->library('encrypt');
      $CI->load->library("spsessionhandler");
    }
    function cleanData($str)
    {
        $CI =& get_instance();
        $cleanstr =mysql_real_escape_string($str);
        return trim($cleanstr);

    }
}