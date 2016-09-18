<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class agenda extends MX_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('pondokkode_model_web');
    //$this->pondokkode_model_web->counter_visitor();
  }

	public function index($uri=0)
	{
    //load model
    $this->load->model('pondokkode_model_web');
    // filter record artikel
    $filter['cari_agenda'] = $this->session->userdata("cari_agenda");
    //keyword
    $data['keywords'] = "";
    //deskripsi
    $data['description'] = "";
    //title web
    $data['title']                      = "Agenda |";
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
    $data['active_info']                = "active";
    $data['active_agenda']              = "active";
    $data['active_pengumuman']          = "";
    $data['active_unduhan']             = "";
    $data['active_file']                = "";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "";
    //get data berita
    $data['data_agenda'] = $this->pondokkode_model_web->get_agenda_index(4,$uri,$filter);
    //create paging
		$data['paging'] = $this->pagination->create_links();
    //get berita populer
    $data['agenda_sidebar'] = $this->pondokkode_model_web->get_agenda_sidebar();
    //get artikel populer
    $data['pengumuman_sidebar'] = $this->pondokkode_model_web->get_pengumuman_sidebar();
    // Set search by judul
    $sess['cari_agenda'] = $this->input->post("cari_agenda");
    $this->session->set_userdata($sess);
    $this->load->view('header',$data);
            $this->load->view('info/agenda/data_agenda');
            $this->load->view('footer');
  }

  public function search()
  {
    if($this->input->post("cari_agenda")=="")
    {
      $this->session->set_flashdata('pesan_notif', 'Search(\'error\',\'\',\'Kolom pencarian masih kosong\');');
      redirect("agenda");
    }
    $sess['cari_agenda'] = mysql_escape_string($this->input->post("cari_agenda"));
    $this->session->set_userdata($sess);
    redirect("agenda");
  }

  public function detail($url)
	{
    //load model
    $this->load->model('pondokkode_model_web');
    //load library comment disqus
    $this->load->library('disqus');
    $data['disqus']  = $this->disqus->get_html();
    //get berita populer
    $data['agenda_sidebar'] = $this->pondokkode_model_web->get_agenda_sidebar();
    //get artikel populer
    $data['pengumuman_sidebar'] = $this->pondokkode_model_web->get_pengumuman_sidebar();
    //get detail berita
    $data['data_agenda'] = $this->pondokkode_model_web->get_detail_agenda($url);
    //$detail = $data['data_artikel'] ->row();
    //id berita
    $id_agenda = $data['data_agenda']->id_agenda;
    //get row record
		$get_view = $this->db->query("SELECT * FROM tbl_agenda WHERE id_agenda='$id_agenda' AND aktif='1'");
		$row = $get_view->row();
		//insert ke database
		$id['id_agenda'] = $id_agenda;
		$update['dilihat'] = $data['data_agenda']->dilihat+1;
		//update view artikel
		$insert = $this->db->update("tbl_agenda",$update,$id);
    //title web
    $data['title'] = $data['data_agenda']->judul_agenda .' |';
    //judul berita
    $data['judul'] = $data['data_agenda']->judul_agenda;
    //keyword
    $data['keywords'] = $data['data_agenda']->tags_agenda;
    //deskripsi
    $data['description'] = strip_tags(substr($data['data_agenda']->isi_agenda,0,300));
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
    $data['active_info']                = "active";
    $data['active_agenda']              = "active";
    $data['active_pengumuman']          = "";
    $data['active_unduhan']             = "";
    $data['active_file']                = "";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "";
    $this->load->view('header',$data);
            $this->load->view('info/agenda/detail_agenda');
            $this->load->view('footer');
  }


}
