<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Email Library - Config
 *
 * @author   Stephen Ralph Moraga
 */
 
$config = array(
  'default' => array(
    'protocol'     => 'smtp',
    'smtp_host'    => 'ssl://smtp.gmail.com',
    'smtp_user'    => 'smtp@n-haus.com',
    'smtp_pass'    => 'smtp2014',
    'smtp_port'    => 465,
    'smtp_timeout' => 5,
    'mailtype'     => 'html',
    'charset'      => 'utf-8',
    'newline'   => "\r\n"
  )
);