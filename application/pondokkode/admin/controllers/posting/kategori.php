<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class kategori extends MX_Controller {

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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Kategori";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Posting ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Kategori ', '#','');
    // filter record berita
    $filter['data_kategori'] = $this->session->userdata("data_kategori");
    //generate data berita
    $data['data_kategori'] = $this->pondokkode_model_admin->generate_kategori($this->config->item("limit_10"),$uri,$filter);
    //loadpagination
    $data['paging'] = $this->pagination->create_links();
    // Set search by nama / username/ id user
    $sess['data_kategori'] = $this->input->post("data_kategori");
    $this->session->set_userdata($sess);
    //active menu sidebar
    $data['dashboard']   = "";
    $data['posting']     = "active";
    $data['artikel']     = "";
    $data['berita']      = "";
    $data['kategori']    = "active";
    $data['info_agenda'] = "";
    $data['agenda']      = "";
    $data['pengumuman']  = "";
    $data['akademik']    = "";
    $data['guru']        = "";
    $data['siswa']       = "";
    $data['statistic']   = "";
    $data['konten']      = "";
    $data['pages']       = "";
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
                      $this->load->view('posting/kategori/data_kategori');
                      $this->load->view('footer');
  }

  public function search()
	{
		    // mencegah user yang belum login untuk mengakses halaman ini
			$this->pondokkode->restrict();
		    // Set search by nama sistem
			$sess['data_kategori'] = mysql_escape_string($this->input->post("data_kategori"));
			$this->session->set_userdata($sess);
			redirect("admin/posting/kategori");
	}

  public function tambah()
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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Artikel";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Posting ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Kategori ', base_url().'admin/posting/kategori','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Tambah ', '#','');
    //deklarasi form
    $data['tipe'] = "tambah";
    $data['id_kategori'] = "";
    $data['nama_kategori'] = "";
    $data['last_data_update'] = "";
    $data['id_user_update'] = "";
    $data['button'] = "Simpan";
    //active menu sidebar
    $data['dashboard']   = "";
    $data['posting']     = "active";
    $data['artikel']     = "";
    $data['berita']      = "";
    $data['kategori']    = "active";
    $data['info_agenda'] = "";
    $data['agenda']      = "";
    $data['pengumuman']  = "";
    $data['akademik']    = "";
    $data['guru']        = "";
    $data['siswa']       = "";
    $data['statistic']   = "";
    $data['konten']      = "";
    $data['pages']       = "";
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
                      $this->load->view('posting/kategori/form_kategori');
                      $this->load->view('footer');
  }

  public function edit($id_kategori)
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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Kategori";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Posting ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Kategori ', base_url().'admin/posting/kategori','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Edit ', '#','');
    //get dwtail berita
    $data['detail_kategori'] = $this->pondokkode_model_admin->tampil_detail_kategori($this->encryption->decode($id_kategori));
    $get = $data['detail_kategori']->row();
    //deklarasi form
    $data['tipe'] = "edit";
    $data['id_kategori'] = $this->encryption->decode($id_kategori);
    $data['nama_kategori'] = $get->nama_kategori;
    $data['last_data_update'] = "";
    $data['id_user_update'] = "";
    $data['button'] = "Update";
    //active menu sidebar
    $data['dashboard']   = "";
    $data['posting']     = "active";
    $data['artikel']     = "";
    $data['berita']      = "active";
    $data['kategori']    = "";
    $data['info_agenda'] = "";
    $data['agenda']      = "";
    $data['pengumuman']  = "";
    $data['akademik']    = "";
    $data['guru']        = "";
    $data['siswa']       = "";
    $data['statistic']   = "";
    $data['konten']      = "";
    $data['pages']       = "";
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
                      $this->load->view('posting/kategori/form_kategori');
                      $this->load->view('footer');
  }

  public function simpan()
  {
  // mencegah user yang belum login untuk mengakses halaman ini
  $this->pondokkode->restrict();
  //cek apakah user aktif ?
  $this->pondokkode->status_aktif($aktif=0);
              $id['id_kategori'] = $this->input->post("id");
              $tipe             = $this->input->post("tipe");
              $nama_kategori    = $this->input->post('nama_kategori');
              $last_data_update = date("Y-m-d H:i:s");
              $id_user_update   = $this->session->userdata('user_id');
              if ($tipe=="tambah"){
                  $insert['nama_kategori']    = $nama_kategori;
                  $insert['last_data_update'] = $last_data_update;
                  $insert['id_user_update']   = $id_user_update;
                  $this->db->insert("tbl_kategori",$insert);
      //deklarasi session flashdata
      $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Simpan Data Sukses\',\'Penambahan data Kategori <strong>'.$nama_kategori.'</strong> berhasil disimpan.\');');

              }else{
                $update['nama_kategori']    = $nama_kategori;
                $update['last_data_update'] = $last_data_update;
                $update['id_user_update']   = $id_user_update;
                $this->db->update("tbl_kategori",$update,$id);
      //deklarasi session flashdata
      $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update Data Sukses\',\'Perubahan data Kategori <strong>'.$nama_kategori.'</strong> berhasil disimpan.\');');

              }
      redirect('admin/posting/kategori');
  }

}
