<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class artikel extends MX_Controller {

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
    $filter['cari_artikel'] = $this->session->userdata("cari_artikel");
    //keyword
    $data['keywords'] = "";
    //deskripsi
    $data['description'] = "";
    //title web
    $data['title']                      = "Artikel |";
    //class menu active
    $data['active_home']                = "";
    $data['active_tentang']             = "";
    $data['active_profil']              = "";
    $data['active_visi_misi']           = "";
    $data['active_struktur_organisasi'] = "";
    $data['active_progam_studi']            = "";
    $data['active_news']                = "active";
    $data['active_berita']              = "";
    $data['active_artikel']             = "active";
    $data['active_info']                = "";
    $data['active_agenda']              = "";
    $data['active_pengumuman']          = "";
    $data['active_unduhan']             = "";
    $data['active_file']                = "";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "";
    //get data berita
    $data['data_artikel'] = $this->pondokkode_model_web->get_artikel_index(4,$uri,$filter);
    //create paging
		$data['paging'] = $this->pagination->create_links();
    //get berita populer
    $data['berita_populer'] = $this->pondokkode_model_web->get_beita_populer();
    //get artikel populer
    $data['artikel_populer'] = $this->pondokkode_model_web->get_artikel_populer();
    // Set search by judul
    $sess['cari_artikel'] = $this->input->post("cari_artikel");
    $this->session->set_userdata($sess);
    $this->load->view('header',$data);
            $this->load->view('news/artikel/data_artikel');
            $this->load->view('footer');
  }

  public function search()
  {
    if($this->input->post("cari_artikel")=="")
    {
      $this->session->set_flashdata('pesan_notif', 'Search(\'error\',\'\',\'Kolom pencarian masih kosong\');');
      redirect("artikel");
    }
    $sess['cari_artikel'] = mysql_escape_string($this->input->post("cari_artikel"));
    $this->session->set_userdata($sess);
    redirect("artikel");
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
    $data['data_artikel'] = $this->pondokkode_model_web->get_detail_artikel($url);
    //$detail = $data['data_artikel'] ->row();
    //id berita
    $id_artikel = $data['data_artikel']->id_artikel;
    //get row record
		$get_view = $this->db->query("SELECT * FROM tbl_artikel WHERE id_artikel='$id_artikel' AND aktif='1'");
		$row = $get_view->row();
		//insert ke database
		$id['id_artikel'] = $id_artikel;
		$update['dilihat'] = $data['data_artikel']->dilihat+1;
		//update view artikel
		$insert = $this->db->update("tbl_artikel",$update,$id);
    //title web
    $data['title'] = $data['data_artikel']->judul_artikel .' |';
    //judul berita
    $data['judul'] = $data['data_artikel']->judul_artikel;
    //keyword
    $data['keywords'] = $data['data_artikel']->tags_artikel;
    //deskripsi
    $data['description'] = strip_tags(substr($data['data_artikel']->isi_artikel,0,300));
    //class menu active
    $data['active_home']                = "";
    $data['active_tentang']             = "";
    $data['active_profil']              = "";
    $data['active_visi_misi']           = "";
    $data['active_struktur_organisasi'] = "";
    $data['active_progam_studi']        = "";
    $data['active_news']                = "active";
    $data['active_berita']              = "";
    $data['active_artikel']             = "active";
    $data['active_info']                = "";
    $data['active_agenda']              = "";
    $data['active_pengumuman']          = "";
    $data['active_unduhan']             = "";
    $data['active_file']                = "";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "";
    $this->load->view('header',$data);
            $this->load->view('news/artikel/detail_artikel');
            $this->load->view('footer');
  }


}
