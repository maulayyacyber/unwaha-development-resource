<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class pengumuman extends MX_Controller {

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
    $filter['cari_pengumuman'] = $this->session->userdata("cari_pengumuman");
    //keyword
    $data['keywords'] = "";
    //deskripsi
    $data['description'] = "";
    //title web
    $data['title']                      = "Pengumuman |";
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
    $data['active_info']                = "active";
    $data['active_agenda']              = "";
    $data['active_pengumuman']          = "active";
    $data['active_unduhan']             = "";
    $data['active_file']                = "";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "";
    //get data berita
    $data['data_pengumuman'] = $this->pondokkode_model_web->get_pengumuman_index(4,$uri,$filter);
    //create paging
		$data['paging'] = $this->pagination->create_links();
    //get berita populer
    $data['agenda_sidebar'] = $this->pondokkode_model_web->get_agenda_sidebar();
    //get artikel populer
    $data['pengumuman_sidebar'] = $this->pondokkode_model_web->get_pengumuman_sidebar();
    // Set search by judul
    $sess['cari_pengumuman'] = $this->input->post("cari_pengumuman");
    $this->session->set_userdata($sess);
    $this->load->view('header',$data);
            $this->load->view('info/pengumuman/data_pengumuman');
            $this->load->view('footer');
  }

  public function search()
  {
    if($this->input->post("cari_pengumuman")=="")
    {
      $this->session->set_flashdata('pesan_notif', 'Search(\'error\',\'\',\'Kolom pencarian masih kosong\');');
      redirect("pengumuman");
    }
    $sess['cari_pengumuman'] = mysql_escape_string($this->input->post("cari_pengumuman"));
    $this->session->set_userdata($sess);
    redirect("pengumumanagenda");
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
    $data['data_pengumuman'] = $this->pondokkode_model_web->get_detail_pengumuman($url);
    //$detail = $data['data_artikel'] ->row();
    //id berita
    $id_pengumuman = $data['data_pengumuman']->id_pengumuman;
    //get row record
		$get_view = $this->db->query("SELECT * FROM tbl_pengumuman WHERE id_pengumuman='$id_pengumuman' AND aktif='1'");
		$row = $get_view->row();
		//insert ke database
		$id['id_pengumuman'] = $id_pengumuman;
		$update['dilihat'] = $data['data_pengumuman']->dilihat+1;
		//update view artikel
		$insert = $this->db->update("tbl_pengumuman",$update,$id);
    //title web
    $data['title'] = $data['data_pengumuman']->judul_pengumuman .' |';
    //judul berita
    $data['judul'] = $data['data_pengumuman']->judul_pengumuman;
    //keyword
    $data['keywords'] = $data['data_pengumuman']->tags_pengumuman;
    //deskripsi
    $data['description'] = strip_tags(substr($data['data_pengumuman']->isi_pengumuman,0,300));
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
    $data['active_info']                = "active";
    $data['active_agenda']              = "";
    $data['active_pengumuman']          = "active";
    $data['active_unduhan']             = "";
    $data['active_file']                = "";
    $data['active_galeri']              = "";
    $data['active_kontak']              = "";
    $this->load->view('header',$data);
            $this->load->view('info/pengumuman/detail_pengumuman');
            $this->load->view('footer');
  }


}
