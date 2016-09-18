<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class galeri extends MX_Controller {

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
    $data['title']                      = "Galeri |";
    //class menu active
    $data['active_home']                = "";
    $data['active_tentang']             = "";
    $data['active_profil']              = "";
    $data['active_visi_misi']           = "";
    $data['active_struktur_organisasi'] = "";
    $data['active_progam_studi']            = "";
    $data['active_news']                = "";
    $data['active_berita']              = "";
    $data['active_artikel']             = "";
    $data['active_info']                = "";
    $data['active_agenda']              = "";
    $data['active_pengumuman']          = "";
    $data['active_unduhan']             = "active";
    $data['active_file']                = "";
    $data['active_galeri']              = "active";
    $data['active_kontak']              = "";
    //load model
    $this->load->model('pondokkode_model_web');
    //get album
    $data['album'] = $this->pondokkode_model_web->get_album();
    //get foto galeri
    $data['foto_galeri'] = $this->pondokkode_model_web->get_foto_galeri();
    $this->load->view('header',$data);
            $this->load->view('galeri/data_galeri');
            $this->load->view('footer');
  }
}
