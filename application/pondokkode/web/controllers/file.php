<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class file extends MX_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('pondokkode_model_web');
    //$this->pondokkode_model_web->counter_visitor();
  }

	public function index()
	{
    //keyword
    $data['keywords'] = $_SESSION['keywords'];
    //deskripsi
    $data['description'] = $_SESSION['descriptions'];
    //title web
    $data['title']                      = "File |";
    //class menu active
    $data['active_home']                = "";
    $data['active_tentang']             = "";
    $data['active_profil']              = "";
    $data['active_visi_misi']           = "";
    $data['active_struktur_organisasi'] = "";
    $data['active_progam_studi']        = "";
    $data['active_news']                = "";
    $data['active_berita']              = "";
    $data['active_artikel']             = "";
    $data['active_info']                = "";
    $data['active_agenda']              = "";
    $data['active_pengumuman']          = "";
    $data['active_unduhan']             = "active";
    $data['active_file']                = "active";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "";
    //load model
    $this->load->model('pondokkode_model_web');
    // filter record file
    $filter['data_file'] = $this->session->userdata("data_file");
    // Set search by judl
    $sess['data_file'] = $this->input->post("data_file");
    $this->session->set_userdata($sess);
    //get file
    $data['file'] = $this->pondokkode_model_web->get_file($filter);
    $this->load->view('header',$data);
            $this->load->view('file/data_file');
            $this->load->view('footer');
  }

  public function search()
	{
      if($this->input->post("data_file")=="")
      {
        $this->session->set_flashdata('pesan_notif', 'Search(\'error\',\'\',\'Kolom pencarian masih kosong\');');
        redirect("file");
      }
		    // Set search by nama sistem
			$sess['data_file'] = mysql_escape_string($this->input->post("data_file"));
			$this->session->set_userdata($sess);
			redirect("file");
	}

}
