<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class berita extends MX_Controller {

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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Berita";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Posting ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Berita ', '#','');
    // filter record berita
    $filter['data_berita'] = $this->session->userdata("data_berita");
    //generate data berita
    $data['data_berita'] = $this->pondokkode_model_admin->generate_berita($this->config->item("limit_10"),$uri,$filter);
    //loadpagination
    $data['paging'] = $this->pagination->create_links();
    // Set search by nama / username/ id user
    $sess['data_berita'] = $this->input->post("data_berita");
    $this->session->set_userdata($sess);
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
                      $this->load->view('posting/berita/data_berita');
                      $this->load->view('footer');
  }

  public function search()
	{
		    // mencegah user yang belum login untuk mengakses halaman ini
			$this->pondokkode->restrict();
		    // Set search by nama sistem
			$sess['data_berita'] = mysql_escape_string($this->input->post("data_berita"));
			$this->session->set_userdata($sess);
			redirect("admin/posting/berita");
	}

  public function activated($id_berita,$value)
	{
		//mencegah user yang belum login mengakses halaman ini
		$this->pondokkode->restrict();
		//cek apakah user aktif ?
    $id_berita = $this->encryption->decode($id_berita);
		$this->pondokkode->status_aktif($aktif=0);
		$id['id_berita'] = $id_berita;
		$update['aktif'] = $value;
		$this->db->update("tbl_berita",$update,$id);
		$query = $this->db->query("SELECT judul_berita FROM tbl_berita WHERE id_berita='$id_berita'")->row();
		if($value==0)
		{
			$this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Penonaktifan Data Sukses\',\'Penonaktifan data berita dengan judul berita: <strong>'.$query->judul_berita.'</strong> berhasil.\');');
		}else{
			$this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Pengaktifan Data Sukses\',\'Pengaktifan data berita dengan judul berita: <strong>'.$query->judul_berita.'</strong> berhasil.\');');
		}
		redirect('admin/posting/berita');
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
    $data['data_js'] = '<script src="'.base_url().'assets/admin/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript"></script>'
                                           . '<script type="text/javascript" src="'.base_url().'assets/admin/ckeditor/ckeditor.js"></script>';
    // Import JS Readey
    $data['js_ready'] = "$('#tags_pages').tagsInput({width: 'auto'});";
    //page title
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Berita";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Posting ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Berita ', base_url().'admin/posting/berita','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Tambah ', '#','');
    //deklarasi form
    $data['tipe'] = "tambah";
    $data['id_berita'] = "";
    $data['judul_berita'] = "";
    $data['isi_berita'] = "";
    $data['tags_berita'] = "";
    $data['last_data_update'] = "";
    $data['id_user_update'] = "";
    $data['button'] = "Simpan";
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
                      $this->load->view('posting/berita/form_berita');
                      $this->load->view('footer');
  }

  public function edit($id_berita)
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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Berita";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Posting ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Berita ', base_url().'admin/posting/berita','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Edit ', '#','');
    //get dwtail berita
    $data['detail_berita'] = $this->pondokkode_model_admin->get_detail_berita($this->encryption->decode($id_berita));
    $get = $data['detail_berita']->row();
    //deklarasi form
    $data['tipe'] = "edit";
    $data['id_berita'] = $this->encryption->decode($id_berita);
    $data['judul_berita'] = $get->judul_berita;
    $data['isi_berita'] = $get->isi_berita;
    $data['tags_berita'] = $get->tags_berita;
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
                      $this->load->view('posting/berita/form_berita');
                      $this->load->view('footer');
  }

  public function simpan()
  {
  // mencegah user yang belum login untuk mengakses halaman ini
  $this->pondokkode->restrict();
  //cek apakah user aktif ?
  $this->pondokkode->status_aktif($aktif=0);
              $id['id_berita'] = $this->input->post("id");
              $tipe  = $this->input->post("tipe");
              $judul = $this->input->post("judul");
              $isi   = $this->input->post("isi");
              $tags  = $this->input->post("tags");
              $aktif = 1;
              $last_data_update = date("Y-m-d H:i:s");
              $id_user_update   = $this->session->userdata('user_id');
              if ($tipe=="tambah"){
                  $insert['judul_berita']     = $judul;
                  $insert['url']              = url_title(strtolower($judul));
                  $insert['isi_berita']       = $isi;
                  $insert['tags_berita']      = $tags;
                  $insert['aktif']            = $aktif;
                  $insert['tgl_publish']      = date("Y-m-d H:i:s");
                  $insert['last_data_update'] = $last_data_update;
                  $insert['id_user_update']   = $id_user_update;
                  $this->db->insert("tbl_berita",$insert);
      //deklarasi session flashdata
      $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Simpan Data Sukses\',\'Penambahan data berita <strong>'.$judul.'</strong> berhasil disimpan.\');');

              }else{
                $update['judul_berita']     = $judul;
                $update['url']              = url_title(strtolower($judul));
                $update['isi_berita']       = $isi;
                $update['tags_berita']      = $tags;
                $update['aktif']            = $aktif;
                $update['last_data_update'] = $last_data_update;
                $update['id_user_update']   = $id_user_update;
                $this->db->update("tbl_berita",$update,$id);
      //deklarasi session flashdata
      $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update Data Sukses\',\'Perubahan data berita <strong>'.$judul.'</strong> berhasil disimpan.\');');

              }
      redirect('admin/posting/berita');
  }

  public function delete($id_berita)
  {

    // mencegah user yang belum login untuk mengakses halaman ini
    $this->pondokkode->restrict();
    // cek apakah status user aktif atau tidak, jika tidak akan ke redirect halaman login
    $this->pondokkode->status_aktif($aktif=0);
    $id_berita = $this->encryption->decode($id_berita);
    $query = $this->db->query("SELECT judul_berita FROM tbl_berita WHERE id_berita='$id_berita'")->row();
    $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Hapus Data Sukses\',\'Hapus data berita dengan judul: <strong>'.$query->judul_berita.'</strong> berhasil.\');');
    $id['id_berita'] = $id_berita;
    $this->db->delete("tbl_berita",$id);
    redirect("admin/posting/berita");
  }

}
