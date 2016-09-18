<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class pondokkode_model_system extends CI_Model {

	public function __construct()
	{
		$dt = $this->db->get("tbl_setting");
		$i = 1;
		foreach($dt->result() as $d)
		{
			$_SESSION['konfig_app_'.$i] = $d->content_setting;
			$i++;
		}
		$_SESSION['admin_title']     = $_SESSION['konfig_app_1'];
		$_SESSION['admin_footer']    = $_SESSION['konfig_app_2'];
		$_SESSION['web_title']       = $_SESSION['konfig_app_3'];
    $_SESSION['web_footer']      = $_SESSION['konfig_app_4'];
    $_SESSION['about']         	 = $_SESSION['konfig_app_5'];
    $_SESSION['alamat']          = $_SESSION['konfig_app_6'];
		$_SESSION['email']          = $_SESSION['konfig_app_7'];
    $_SESSION['telp']        		 = $_SESSION['konfig_app_8'];
    $_SESSION['facebook']        = $_SESSION['konfig_app_9'];
    $_SESSION['twitter']         = $_SESSION['konfig_app_10'];
    $_SESSION['google+']         = $_SESSION['konfig_app_11'];
    $_SESSION['keywords'] 			 = $_SESSION['konfig_app_12'];
    $_SESSION['descriptions']    = $_SESSION['konfig_app_13'];
		$_SESSION['logo'] 				   = $_SESSION['konfig_app_14'];

		// get setting email
		$get = $this->db->get("tbl_setting_email");
		$a=1;
		foreach($get->result() as $row)
		{
						$_SESSION['email_'.$a] = $row->nilai_parameter;
						$a++;
		}
		$_SESSION['protocol']  = $_SESSION['email_1'];
		$_SESSION['smtp_host'] = $_SESSION['email_2'];
		$_SESSION['smtp_user'] = $_SESSION['email_3'];
		$_SESSION['smtp_pass'] = $_SESSION['email_4'];
		$_SESSION['smtp_port'] = $_SESSION['email_5'];

	}
}

/* End of file config_model.php */
/* Location: ./application/models/config_model.php */
