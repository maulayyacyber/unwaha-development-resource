<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class artikel extends MX_Controller {

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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Artikel";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Posting ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Artikel ', '#','');
    // filter record berita
    $filter['data_artikel'] = $this->session->userdata("data_artikel");
    //generate data berita
    $data['data_artikel'] = $this->pondokkode_model_admin->generate_artikel($this->config->item("limit_10"),$uri,$filter);
    //loadpagination
    $data['paging'] = $this->pagination->create_links();
    // Set search by nama / username/ id user
    $sess['data_artikel'] = $this->input->post("data_artikel");
    $this->session->set_userdata($sess);
    //active menu sidebar
    $data['dashboard']   = "";
    $data['posting']     = "active";
    $data['artikel']     = "active";
    $data['berita']      = "";
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
                      $this->load->view('posting/artikel/data_artikel');
                      $this->load->view('footer');
  }

  public function search()
	{
		    // mencegah user yang belum login untuk mengakses halaman ini
			$this->pondokkode->restrict();
		    // Set search by nama sistem
			$sess['data_artikel'] = mysql_escape_string($this->input->post("data_artikel"));
			$this->session->set_userdata($sess);
			redirect("admin/posting/artikel");
	}

  public function activated($id_artikel,$value)
	{
		//mencegah user yang belum login mengakses halaman ini
		$this->pondokkode->restrict();
		//cek apakah user aktif ?
    $id_artikel = $this->encryption->decode($id_artikel);
		$this->pondokkode->status_aktif($aktif=0);
		$id['id_artikel'] = $id_artikel;
		$update['aktif'] = $value;
		$this->db->update("tbl_artikel",$update,$id);
		$query = $this->db->query("SELECT judul_artikel FROM tbl_artikel WHERE id_artikel='$id_artikel'")->row();
		if($value==0)
		{
			$this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Penonaktifan Data Sukses\',\'Penonaktifan data artikel dengan judul artikel: <strong>'.$query->judul_artikel.'</strong> berhasil.\');');
		}else{
			$this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Pengaktifan Data Sukses\',\'Pengaktifan data artikel dengan judul artikel: <strong>'.$query->judul_artikel.'</strong> berhasil.\');');
		}
		redirect('admin/posting/artikel');
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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Artikel";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Posting ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Artikel ', base_url().'admin/posting/artikel','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Tambah ', '#','');
    //get kategori artikel
    $data['kat_artikel'] = $this->pondokkode_model_admin->get_kategori_artikel();
    //deklarasi form
    $data['tipe'] = "tambah";
    $data['id_artikel'] = "";
    $data['judul_artikel'] = "";
    $data['kategori_artikel'] = "";
    $data['isi_artikel'] = "";
    $data['tags_artikel'] = "";
    $data['last_data_update'] = "";
    $data['id_user_update'] = "";
    $data['button'] = "Simpan";
    //active menu sidebar
    $data['dashboard']   = "";
    $data['posting']     = "active";
    $data['artikel']     = "active";
    $data['berita']      = "";
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
                      $this->load->view('posting/artikel/form_artikel');
                      $this->load->view('footer');
  }

  public function edit($id_artikel)
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
    $this->breadcrumb->append_crumb('','Artikel ', base_url().'admin/posting/artikel','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Edit ', '#','');
    //get dwtail berita
    $data['detail_artikel'] = $this->pondokkode_model_admin->get_detail_artikel($this->encryption->decode($id_artikel));
    $get = $data['detail_artikel']->row();
    //get kategori artikel
    $data['kat_artikel'] = $this->pondokkode_model_admin->get_kategori_artikel();
    //deklarasi form
    $data['tipe'] = "edit";
    $data['id_artikel'] = $this->encryption->decode($id_artikel);
    $data['judul_artikel'] = $get->judul_artikel;
    $data['kategori_artikel'] = $get->kategori_artikel;
    $data['isi_artikel'] = $get->isi_artikel;
    $data['tags_artikel'] = $get->tags_artikel;
    $data['last_data_update'] = "";
    $data['id_user_update'] = "";
    $data['button'] = "Update";
    //active menu sidebar
    $data['dashboard']   = "";
    $data['posting']     = "active";
    $data['artikel']     = "active";
    $data['berita']      = "";
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
                      $this->load->view('posting/artikel/form_artikel');
                      $this->load->view('footer');
  }

  public function simpan()
  {
  // mencegah user yang belum login untuk mengakses halaman ini
  $this->pondokkode->restrict();
  //cek apakah user aktif ?
  $this->pondokkode->status_aktif($aktif=0);
              $id['id_artikel'] = $this->input->post("id");
              $tipe             = $this->input->post("tipe");
              $judul            = $this->input->post("judul");
              $kategori         = $this->input->post("kategori");
              $isi              = $this->input->post("isi");
              $tags             = $this->input->post("tags");
              $aktif            = 1;
              $last_data_update = date("Y-m-d H:i:s");
              $id_user_update   = $this->session->userdata('user_id');
              if ($tipe=="tambah"){
                  $insert['judul_artikel']    = $judul;
                  $insert['kategori_artikel'] = $kategori;
                  $insert['url']              = url_title(strtolower($judul));
                  $insert['isi_artikel']      = $isi;
                  $insert['tags_artikel']     = $tags;
                  $insert['aktif']            = $aktif;
                  $insert['tgl_publish']      = date("Y-m-d H:i:s");
                  $insert['last_data_update'] = $last_data_update;
                  $insert['id_user_update']   = $id_user_update;
                  $this->db->insert("tbl_artikel",$insert);
      //deklarasi session flashdata
      $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Simpan Data Sukses\',\'Penambahan data berita <strong>'.$judul.'</strong> berhasil disimpan.\');');

              }else{
                $update['judul_artikel']     = $judul;
                $update['kategori_artikel'] = $kategori;
                $update['url']              = url_title(strtolower($judul));
                $update['isi_artikel']       = $isi;
                $update['tags_artikel']      = $tags;
                $update['aktif']            = $aktif;
                $update['last_data_update'] = $last_data_update;
                $update['id_user_update']   = $id_user_update;
                $this->db->update("tbl_artikel",$update,$id);
      //deklarasi session flashdata
      $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update Data Sukses\',\'Perubahan data berita <strong>'.$judul.'</strong> berhasil disimpan.\');');

              }
      redirect('admin/posting/artikel');
  }

  public function delete($id_artikel)
  {

    // mencegah user yang belum login untuk mengakses halaman ini
    $this->pondokkode->restrict();
    // cek apakah status user aktif atau tidak, jika tidak akan ke redirect halaman login
    $this->pondokkode->status_aktif($aktif=0);
    $id_artikel = $this->encryption->decode($id_artikel);
    $query = $this->db->query("SELECT judul_artikel FROM tbl_artikel WHERE id_artikel='$id_artikel'")->row();
    $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Hapus Data Sukses\',\'Hapus data artikel dengan judul: <strong>'.$query->judul_artikel.'</strong> berhasil.\');');
    $id['id_artikel'] = $id_artikel;
    $this->db->delete("tbl_artikel",$id);
    redirect("admin/posting/artikel");
  }

}
