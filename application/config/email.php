<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['protocol'] = 'smtp';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;
$config['mailtype'] = 'html';

$config['smtp_host'] = $_SESSION['smtp_host'];
$config['smtp_user'] = $_SESSION['smtp_user'];
$config['smtp_pass'] = $_SESSION['smtp_pass'];
$config['smtp_port'] = $_SESSION['smtp_port'];
