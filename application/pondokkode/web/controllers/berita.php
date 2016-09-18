<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class berita extends MX_Controller {

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
     $filter['cari_berita'] = $this->session->userdata("cari_berita");
    //keyword
    $data['keywords'] = "";
    //deskripsi
    $data['description'] = "";
    //title web
    $data['title']                      = "Berita |";
    //class menu active
    $data['active_home']                = "";
    $data['active_tentang']             = "";
    $data['active_profil']              = "";
    $data['active_visi_misi']           = "";
    $data['active_struktur_organisasi'] = "";
    $data['active_progam_studi']        = "";
    $data['active_news']                = "active";
    $data['active_berita']              = "active";
    $data['active_artikel']             = "";
    $data['active_info']                = "";
    $data['active_agenda']              = "";
    $data['active_pengumuman']          = "";
    $data['active_unduhan']             = "";
    $data['active_file']                = "";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "";
    //get data berita
    $data['data_berita'] = $this->pondokkode_model_web->get_berita_index(4,$uri,$filter);
    //create paging
		$data['paging'] = $this->pagination->create_links();
    //get berita populer
    $data['berita_populer'] = $this->pondokkode_model_web->get_beita_populer();
    //get artikel populer
    $data['artikel_populer'] = $this->pondokkode_model_web->get_artikel_populer();
    // Set search by judul
    $sess['cari_berita'] = $this->input->post("cari_berita");
    $this->session->set_userdata($sess);
    $this->load->view('header',$data);
            $this->load->view('news/berita/data_berita');
            $this->load->view('footer');
  }

  public function search()
  {
    if($this->input->post("cari_berita")=="")
    {
      $this->session->set_flashdata('pesan_notif', 'Search(\'error\',\'\',\'Kolom pencarian masih kosong\');');
      redirect("berita");
    }
    $sess['cari_berita'] = mysql_escape_string($this->input->post("cari_berita"));
    $this->session->set_userdata($sess);
    redirect("berita");
  }

  public function detail($url)
	{
    //load model
    $this->load->model('pondokkode_model_web');
    //load library comment disqus
    $this->load->library('disqus');
    $data['disqus']  = $this->disqus->get_html();
    //get berita populer
    $data['berita_populer'] = $this->pondokkode_model_web->get_beita_populer();
    //get artikel populer
    $data['artikel_populer'] = $this->pondokkode_model_web->get_artikel_populer();
    //get detail berita
    $data['data_berita'] = $this->pondokkode_model_web->get_detail_berita($url);
    //$detail = $data['data_berita'] ->row();
    //id berita
    $id_berita = $data['data_berita']->id_berita;
    //get row record
		$get_view = $this->db->query("SELECT * FROM tbl_berita WHERE id_berita='$id_berita' AND aktif='1'");
		$row = $get_view->row();
		//insert ke database
		$id['id_berita'] = $id_berita;
		$update['dilihat'] = $data['data_berita']->dilihat+1;
		//update view artikel
		$insert = $this->db->update("tbl_berita",$update,$id);
    //title web
    $data['title'] = $data['data_berita']->judul_berita .' |';
    //judul berita
    $data['judul'] = $data['data_berita']->judul_berita;
    //keyword
    $data['keywords'] = $data['data_berita']->tags_berita;
    //deskripsi
    $data['description'] = strip_tags(substr($data['data_berita']->isi_berita,0,300));
    //class menu active
    $data['active_home']                = "";
    $data['active_tentang']             = "";
    $data['active_profil']              = "";
    $data['active_visi_misi']           = "";
    $data['active_struktur_organisasi'] = "";
    $data['active_progam_studi']        = "";
    $data['active_news']                = "active";
    $data['active_berita']              = "active";
    $data['active_artikel']             = "";
    $data['active_info']                = "";
    $data['active_agenda']              = "";
    $data['active_pengumuman']          = "";
    $data['active_unduhan']             = "";
    $data['active_file']                = "";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "";
    $this->load->view('header',$data);
            $this->load->view('news/berita/detail_berita');
            $this->load->view('footer');
  }

}
