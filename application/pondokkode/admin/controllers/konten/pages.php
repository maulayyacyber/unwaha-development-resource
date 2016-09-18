<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class pages extends MX_Controller {

function _construct(){
parent::__construct();
if(!$this->session->sess_read()){
    $data['login_info'] = '';
    $this->load->view('login',$data);
}
}

	public function index($uri=0)
	{
    // mencegah user yang belum login untuk mengakses halaman ini
    $this->pondokkode->restrict();
    // load model 'admin_model'
    $this->load->model('pondokkode_model_admin');
    //cek apakah user aktif ?
    $this->pondokkode->status_aktif($aktif=0);
    // Import JS
    $data['data_js'] = '';
    // Import JS Readey
    $data['js_ready'] = "";
    //page title
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Pages";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Konten ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Pages ', '#','');
    // filter record berita
    $filter['data_pages'] = $this->session->userdata("data_pages");
    //generate data berita
    $data['data_pages'] = $this->pondokkode_model_admin->generate_pages($this->config->item("limit_10"),$uri,$filter);
    //loadpagination
    $data['paging'] = $this->pagination->create_links();
    // Set search by nama / username/ id user
    $sess['data_pages'] = $this->input->post("data_pages");
    $this->session->set_userdata($sess);
    //active menu sidebar
    $data['dashboard']   = "";
    $data['posting']     = "";
    $data['artikel']     = "";
    $data['berita']      = "";
    $data['kategori']    = "";
    $data['info_agenda'] = "";
    $data['agenda']      = "";
    $data['pengumuman']  = "";
    $data['akademik']    = "";
    $data['guru']        = "";
    $data['siswa']       = "";
    $data['statistic']   = "";
    $data['konten']      = "active";
    $data['pages']       = "active";
    $data['menu']        = "";
    $data['file']        = "";
    $data['galeri']      = "";
    $data['testimoni']   = "";
    $data['master']      = "";
    $data['user']        = "";
    $data['log_session'] = "";
    $data['setting']     = "";
    $data['umum']        = "";
    $data['banner']      = "";
    //tampilkan view dengan data
    $this->load->view('header',$data);
                      $this->load->view('sidebar');
                      $this->load->view('breadcrumb');
                      $this->load->view('konten/pages/data_pages');
                      $this->load->view('footer');
  }

  public function search()
	{
		    // mencegah user yang belum login untuk mengakses halaman ini
			$this->pondokkode->restrict();
		    // Set search by nama sistem
			$sess['data_pages'] = mysql_escape_string($this->input->post("data_pages"));
			$this->session->set_userdata($sess);
			redirect("admin/konten/pages");
	}

  public function edit($id_pages)
	{
    // mencegah user yang belum login untuk mengakses halaman ini
    $this->pondokkode->restrict();
    // load model 'admin_model'
    $this->load->model('pondokkode_model_admin');
    //cek apakah user aktif ?
    $this->pondokkode->status_aktif($aktif=0);
    // Import JS
    $data['data_js'] = '<script src="'.base_url().'assets/admin/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript"></script>'
                                           . '<script type="text/javascript" src="'.base_url().'assets/admin/ckeditor/ckeditor.js"></script>';
    // Import JS Readey
    $data['js_ready'] = "$('#tags_pages').tagsInput({width: 'auto'});";
    //page title
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Pages";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Konten ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Pages ', base_url().'admin/konten/pages','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Edit ', '#','');
    //get dwtail berita
    $data['detail_pages'] = $this->pondokkode_model_admin->get_detail_pages($this->encryption->decode($id_pages));
    $get = $data['detail_pages']->row();
    //deklarasi form
    $data['tipe'] = "edit";
    $data['id_pages'] = $this->encryption->decode($id_pages);
    $data['judul_pages'] = $get->judul_pages;
    $data['isi_pages'] = $get->isi_pages;
    $data['tags_pages'] = $get->tags_pages;
    $data['last_data_update'] = "";
    $data['id_user_update'] = "";
    $data['button'] = "Update";
    //active menu sidebar
    $data['dashboard']   = "";
    $data['posting']     = "";
    $data['artikel']     = "";
    $data['berita']      = "";
    $data['kategori']    = "";
    $data['info_agenda'] = "";
    $data['agenda']      = "";
    $data['pengumuman']  = "";
    $data['akademik']    = "";
    $data['guru']        = "";
    $data['siswa']       = "";
    $data['statistic']   = "";
    $data['konten']      = "active";
    $data['pages']       = "active";
    $data['menu']        = "";
    $data['file']        = "";
    $data['galeri']      = "";
    $data['testimoni']   = "";
    $data['master']      = "";
    $data['user']        = "";
    $data['log_session'] = "";
    $data['setting']     = "";
    $data['umum']        = "";
    $data['banner']      = "";
    //tampilkan view dengan data
    $this->load->view('header',$data);
                      $this->load->view('sidebar');
                      $this->load->view('breadcrumb');
                      $this->load->view('konten/pages/form_pages');
                      $this->load->view('footer');
  }

  public function simpan()
  {
  // mencegah user yang belum login untuk mengakses halaman ini
  $this->pondokkode->restrict();
  //cek apakah user aktif ?
  $this->pondokkode->status_aktif($aktif=0);
              $id['id_pages'] = $this->input->post("id");
              $tipe  = $this->input->post("tipe");
              $judul = $this->input->post("judul");
              $isi   = $this->input->post("isi");
              $tags  = $this->input->post("tags");
              $last_data_update = date("Y-m-d H:i:s");
              $id_user_update   = $this->session->userdata('user_id');
              if ($tipe=="tambah"){
                  $insert['judul_pages']     = $judul;
                  $insert['url']              = url_title(strtolower($judul));
                  $insert['isi_pages']       = $isi;
                  $insert['tags_pages']      = $tags;
                  $insert['last_data_update'] = $last_data_update;
                  $insert['id_user_update']   = $id_user_update;
                  $this->db->insert("tbl_pages",$insert);
      //deklarasi session flashdata
      $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Simpan Data Sukses\',\'Penambahan data pages <strong>'.$judul.'</strong> berhasil disimpan.\');');

              }else{
                $update['judul_pages']     = $judul;
                $update['url']              = url_title(strtolower($judul));
                $update['isi_pages']       = $isi;
                $update['tags_pages']      = $tags;
                $update['last_data_update'] = $last_data_update;
                $update['id_user_update']   = $id_user_update;
                $this->db->update("tbl_pages",$update,$id);
      //deklarasi session flashdata
      $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update Data Sukses\',\'Perubahan data pages <strong>'.$judul.'</strong> berhasil disimpan.\');');
              }

      redirect('admin/konten/pages');
  }

}
