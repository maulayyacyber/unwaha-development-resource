<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class web extends MX_Controller {

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
    $data['title']                      = "";
    //class menu active
    $data['active_home']                = "active";
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
    $data['active_unduhan']             = "";
    $data['active_file']                = "";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "";
    //load model
    $this->load->model('pondokkode_model_web');
    //get banner
    $data['banner'] = $this->pondokkode_model_web->get_banner();
    //get berita web
    $data['berita'] = $this->pondokkode_model_web->get_berita_web();
    //get pengumuman
    $data['pengumuman'] = $this->pondokkode_model_web->get_pengumuman_sidebar();
    //get agenda
    $data['agenda'] = $this->pondokkode_model_web->get_agenda_sidebar();
    $this->load->view('header',$data);
            $this->load->view('slider');
            $this->load->view('home');
            $this->load->view('footer');
  }

  public function profil()
  {
    //keyword
    $data['keywords'] = $_SESSION['keywords'];
    //deskripsi
    $data['description'] = $_SESSION['descriptions'];
    //title web
    $data['title']                      = "Profil | ";
	$data['data_page'] = $this->pondokkode_model_web->get_menu(1); 
    //get berita populer
    $data['berita_populer'] = $this->pondokkode_model_web->get_beita_populer();
    //get artikel populer
    $data['artikel_populer'] = $this->pondokkode_model_web->get_artikel_populer();	
    //class menu active
    $data['active_home']                = "";
    $data['active_tentang']             = "active";
    $data['active_profil']              = "active";
    $data['active_visi_misi']           = "";
    $data['active_struktur_organisasi'] = "";
    $data['active_progam_studi']        = "";
    $data['active_news']                = "";
    $data['active_berita']              = "";
    $data['active_artikel']             = "";
    $data['active_info']                = "";
    $data['active_agenda']              = "";
    $data['active_pengumuman']          = "";
    $data['active_unduhan']             = "";
    $data['active_file']                = "";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "";
    $this->load->view('header',$data);
            $this->load->view('page/tentang');
            $this->load->view('footer');
  }

  public function visi_misi()
  {
    //keyword
    $data['keywords'] = $_SESSION['keywords'];
    //deskripsi
    $data['description'] = $_SESSION['descriptions'];
    //title web
    $data['title']                      = "Visi dan Misi | ";
	$data['data_page'] = $this->pondokkode_model_web->get_menu(2); 
    //get berita populer
    $data['berita_populer'] = $this->pondokkode_model_web->get_beita_populer();
    //get artikel populer
    $data['artikel_populer'] = $this->pondokkode_model_web->get_artikel_populer();	
    //class menu active
    $data['active_home']                = "";
    $data['active_tentang']             = "active";
    $data['active_profil']              = "";
    $data['active_visi_misi']           = "active";
    $data['active_struktur_organisasi'] = "";
    $data['active_progam_studi']        = "";
    $data['active_news']                = "";
    $data['active_berita']              = "";
    $data['active_artikel']             = "";
    $data['active_info']                = "";
    $data['active_agenda']              = "";
    $data['active_pengumuman']          = "";
    $data['active_unduhan']             = "";
    $data['active_file']                = "";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "";
    $this->load->view('header',$data);
            $this->load->view('page/tentang');
            $this->load->view('footer');
  }  
  
  public function struktur_organisasi()
  {
    //keyword
    $data['keywords'] = $_SESSION['keywords'];
    //deskripsi
    $data['description'] = $_SESSION['descriptions'];
    //title web
    $data['title']                      = "Struktur Organisasi | ";
	$data['data_page'] = $this->pondokkode_model_web->get_menu(3); 
    //get berita populer
    $data['berita_populer'] = $this->pondokkode_model_web->get_beita_populer();
    //get artikel populer
    $data['artikel_populer'] = $this->pondokkode_model_web->get_artikel_populer();	
    //class menu active
    $data['active_home']                = "";
    $data['active_tentang']             = "active";
    $data['active_profil']              = "";
    $data['active_visi_misi']           = "";
    $data['active_struktur_organisasi'] = "active";
    $data['active_progam_studi']        = "";
    $data['active_news']                = "";
    $data['active_berita']              = "";
    $data['active_artikel']             = "";
    $data['active_info']                = "";
    $data['active_agenda']              = "";
    $data['active_pengumuman']          = "";
    $data['active_unduhan']             = "";
    $data['active_file']                = "";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "";
    $this->load->view('header',$data);
            $this->load->view('page/tentang');
            $this->load->view('footer');
  }    

  public function teknik_informatika()
  {
    //keyword
    $data['keywords'] = $_SESSION['keywords'];
    //deskripsi
    $data['description'] = $_SESSION['descriptions'];
    //title web
    $data['title']                      = "Teknik Informatika | ";
	$data['data_page'] = $this->pondokkode_model_web->get_menu(4); 
    //get berita populer
    $data['berita_populer'] = $this->pondokkode_model_web->get_beita_populer();
    //get artikel populer
    $data['artikel_populer'] = $this->pondokkode_model_web->get_artikel_populer();	
    //class menu active
    $data['active_home']                = "";
    $data['active_tentang']             = "active";
    $data['active_profil']              = "";
    $data['active_visi_misi']           = "";
    $data['active_struktur_organisasi'] = "";
    $data['active_news']                = "";
    $data['active_berita']              = "";
    $data['active_artikel']             = "";
    $data['active_info']                = "";
    $data['active_agenda']              = "";
    $data['active_pengumuman']          = "";
    $data['active_unduhan']             = "";
    $data['active_file']                = "";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "";
    $this->load->view('header',$data);
            $this->load->view('page/tentang');
            $this->load->view('footer');
  }  
 
  public function sistem_informasi()
  {
    //keyword
    $data['keywords'] = $_SESSION['keywords'];
    //deskripsi
    $data['description'] = $_SESSION['descriptions'];
    //title web
    $data['title']                      = "Sistem Informasi | ";
	$data['data_page'] = $this->pondokkode_model_web->get_menu(5); 
    //get berita populer
    $data['berita_populer'] = $this->pondokkode_model_web->get_beita_populer();
    //get artikel populer
    $data['artikel_populer'] = $this->pondokkode_model_web->get_artikel_populer();	
    //class menu active
    $data['active_home']                = "";
    $data['active_tentang']             = "active";
    $data['active_profil']              = "";
    $data['active_visi_misi']           = "";
    $data['active_struktur_organisasi'] = "";
    $data['active_news']                = "";
    $data['active_berita']              = "";
    $data['active_artikel']             = "";
    $data['active_info']                = "";
    $data['active_agenda']              = "";
    $data['active_pengumuman']          = "";
    $data['active_unduhan']             = "";
    $data['active_file']                = "";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "";
    $this->load->view('header',$data);
            $this->load->view('page/tentang');
            $this->load->view('footer');
  }
 
  public function about_us()
  {
    //keyword
    $data['keywords'] = $_SESSION['keywords'];
    //deskripsi
    $data['description'] = $_SESSION['descriptions'];
    //title web
    $data['title']                      = "About Us | ";
	$data['data_page'] = $this->pondokkode_model_web->get_pages(2); 
    //get berita populer
    $data['berita_populer'] = $this->pondokkode_model_web->get_beita_populer();
    //get artikel populer
    $data['artikel_populer'] = $this->pondokkode_model_web->get_artikel_populer();	
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
    $data['active_unduhan']             = "";
    $data['active_file']                = "";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "";
    $this->load->view('header',$data);
            $this->load->view('page/pages');
            $this->load->view('footer');
  }  
  
  public function disclaimer()
  {
    //keyword
    $data['keywords'] = $_SESSION['keywords'];
    //deskripsi
    $data['description'] = $_SESSION['descriptions'];
    //title web
    $data['title']                      = "Disclaimer | ";
	$data['data_page'] = $this->pondokkode_model_web->get_pages(3); 
    //get berita populer
    $data['berita_populer'] = $this->pondokkode_model_web->get_beita_populer();
    //get artikel populer
    $data['artikel_populer'] = $this->pondokkode_model_web->get_artikel_populer();	
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
    $data['active_unduhan']             = "";
    $data['active_file']                = "";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "";
    $this->load->view('header',$data);
            $this->load->view('page/pages');
            $this->load->view('footer');
  }    

  public function terms_of_service()
  {
    //keyword
    $data['keywords'] = $_SESSION['keywords'];
    //deskripsi
    $data['description'] = $_SESSION['descriptions'];
    //title web
    $data['title']                      = "Terms Of Service | ";
	$data['data_page'] = $this->pondokkode_model_web->get_pages(4); 
    //get berita populer
    $data['berita_populer'] = $this->pondokkode_model_web->get_beita_populer();
    //get artikel populer
    $data['artikel_populer'] = $this->pondokkode_model_web->get_artikel_populer();	
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
    $data['active_unduhan']             = "";
    $data['active_file']                = "";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "";
    $this->load->view('header',$data);
            $this->load->view('page/pages');
            $this->load->view('footer');
  }  

  public function privacy_policy()
  {
    //keyword
    $data['keywords'] = $_SESSION['keywords'];
    //deskripsi
    $data['description'] = $_SESSION['descriptions'];
    //title web
    $data['title']                      = "Privacy Policy | ";
	$data['data_page'] = $this->pondokkode_model_web->get_pages(1); 
    //get berita populer
    $data['berita_populer'] = $this->pondokkode_model_web->get_beita_populer();
    //get artikel populer
    $data['artikel_populer'] = $this->pondokkode_model_web->get_artikel_populer();	
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
    $data['active_unduhan']             = "";
    $data['active_file']                = "";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "";
    $this->load->view('header',$data);
            $this->load->view('page/pages');
            $this->load->view('footer');
  }  
  
  public function error()
  {
    //keyword
    $data['keywords'] = $_SESSION['keywords'];
    //deskripsi
    $data['description'] = $_SESSION['descriptions'];
    //title web
    $data['title']                      = "404 Error | ";
    //class menu active
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
    $data['active_unduhan']             = "";
    $data['active_file']                = "";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "";
    $this->load->view('header',$data);
            $this->load->view('page/404');
            $this->load->view('footer');
  }

  public function kontak()
  {
    //keyword
    $data['keywords'] = $_SESSION['keywords'];
    //deskripsi
    $data['description'] = $_SESSION['descriptions'];
    //title web
    $data['title']                      = "Kontak | ";
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
    $data['active_unduhan']             = "";
    $data['active_file']                = "";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "active";
    $this->load->view('header',$data);
            $this->load->view('kontak/form_kontak.php');
            $this->load->view('footer');
  }

  public function kirim_pesan()
  {
    $nama    = $this->input->post("name");
    $email   = $this->input->post("email");
    $message = $this->input->post("message");
    $insert['nama_testimoni']  = $nama;
    $insert['email_testimoni'] = $email;
    $insert['isi_testimoni']   = $message;
    $insert['date_testimoni']  = date("Y-m-d H:i:s");
    $this->db->insert("tbl_testimoni",$insert);
    $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Kirim pesan success\',\'kirim pesan dari '.$nama.' berhasil dikirim.\');');
    redirect("kontak");
  }

}
