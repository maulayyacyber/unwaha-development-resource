<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class pengumuman extends MX_Controller {

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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Pengumuman";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Info ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Pengumuman ', '#','');
    // filter record berita
    $filter['data_pengumuman'] = $this->session->userdata("data_pengumuman");
    //generate data berita
    $data['data_pengumuman'] = $this->pondokkode_model_admin->generate_pengumuman($this->config->item("limit_10"),$uri,$filter);
    //loadpagination
    $data['paging'] = $this->pagination->create_links();
    // Set search by nama / username/ id user
    $sess['data_pengumuman'] = $this->input->post("data_pengumuman");
    $this->session->set_userdata($sess);
    //active menu sidebar
    $data['dashboard']   = "";
    $data['posting']     = "";
    $data['artikel']     = "";
    $data['berita']      = "";
    $data['kategori']    = "";
    $data['info_agenda'] = "active";
    $data['agenda']      = "";
    $data['pengumuman']  = "active";
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
                      $this->load->view('info/pengumuman/data_pengumuman');
                      $this->load->view('footer');
  }

  public function search()
	{
		    // mencegah user yang belum login untuk mengakses halaman ini
			$this->pondokkode->restrict();
		    // Set search by nama sistem
			$sess['data_pengumuman'] = mysql_escape_string($this->input->post("data_pengumuman"));
			$this->session->set_userdata($sess);
			redirect("admin/info/pengumuman");
	}

  public function activated($id_pengumuman,$value)
	{
		//mencegah user yang belum login mengakses halaman ini
		$this->pondokkode->restrict();
		//cek apakah user aktif ?
    $id_pengumuman = $this->encryption->decode($id_pengumuman);
		$this->pondokkode->status_aktif($aktif=0);
		$id['id_pengumuman'] = $id_pengumuman;
		$update['aktif'] = $value;
		$this->db->update("tbl_pengumuman",$update,$id);
		$query = $this->db->query("SELECT judul_pengumuman FROM tbl_pengumuman WHERE id_pengumuman='$id_pengumuman'")->row();
		if($value==0)
		{
			$this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Penonaktifan Data Sukses\',\'Penonaktifan data pengumuman dengan judul agenda: <strong>'.$query->judul_pengumuman.'</strong> berhasil.\');');
		}else{
			$this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Pengaktifan Data Sukses\',\'Pengaktifan data pengumuman dengan judul agenda: <strong>'.$query->judul_pengumuman.'</strong> berhasil.\');');
		}
		redirect('admin/info/pengumuman');
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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Pengumuman";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Info ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Pengumuman ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Tambah ', '#','');
    //deklarasi form
    $data['tipe'] = "tambah";
    $data['id_pengumuman'] = "";
    $data['judul_pengumuman'] = "";
    $data['isi_pengumuman'] = "";
    $data['tags_pengumuman'] = "";
    $data['last_data_update'] = "";
    $data['id_user_update'] = "";
    $data['button'] = "Simpan";
    //active menu sidebar
    $data['dashboard']   = "";
    $data['posting']     = "";
    $data['artikel']     = "";
    $data['berita']      = "";
    $data['kategori']    = "";
    $data['info_agenda'] = "active";
    $data['agenda']      = "";
    $data['pengumuman']  = "active";
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
                      $this->load->view('info/pengumuman/form_pengumuman');
                      $this->load->view('footer');
  }

  public function edit($id_pengumuman)
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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Pengumuman";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Info ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Pengumuman ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Edit ', '#','');
    //get dwtail berita
    $data['detail_pengumuman'] = $this->pondokkode_model_admin->get_detail_pengumuman($this->encryption->decode($id_pengumuman));
    $get = $data['detail_pengumuman']->row();
    //deklarasi form
    $data['tipe'] = "edit";
    $data['id_pengumuman'] = $this->encryption->decode($id_pengumuman);
    $data['judul_pengumuman'] = $get->judul_pengumuman;
    $data['isi_pengumuman'] = $get->isi_pengumuman;
    $data['tags_pengumuman'] = $get->tags_pengumuman;
    $data['last_data_update'] = "";
    $data['id_user_update'] = "";
    $data['button'] = "Update";
    //active menu sidebar
    $data['dashboard']   = "";
    $data['posting']     = "";
    $data['artikel']     = "";
    $data['berita']      = "";
    $data['kategori']    = "";
    $data['info_agenda'] = "active";
    $data['agenda']      = "";
    $data['pengumuman']  = "active";
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
                      $this->load->view('info/pengumuman/form_pengumuman');
                      $this->load->view('footer');
  }

  public function simpan()
  {
  // mencegah user yang belum login untuk mengakses halaman ini
  $this->pondokkode->restrict();
  //cek apakah user aktif ?
  $this->pondokkode->status_aktif($aktif=0);
              $id['id_pengumuman'] = $this->input->post("id");
              $tipe  = $this->input->post("tipe");
              $judul = $this->input->post("judul");
              $isi   = $this->input->post("isi");
              $tags  = $this->input->post("tags");
              $aktif = 1;
              $last_data_update = date("Y-m-d H:i:s");
              $id_user_update   = $this->session->userdata('user_id');
              if ($tipe=="tambah"){
                  $insert['judul_pengumuman'] = $judul;
                  $insert['url']              = url_title(strtolower($judul));
                  $insert['isi_pengumuman']   = $isi;
                  $insert['tags_pengumuman']  = $tags;
                  $insert['aktif']            = $aktif;
                  $insert['tgl_publish']      = date("Y-m-d H:i:s");
                  $insert['last_data_update'] = $last_data_update;
                  $insert['id_user_update']   = $id_user_update;
                  $this->db->insert("tbl_pengumuman",$insert);
      //deklarasi session flashdata
      $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Simpan Data Sukses\',\'Penambahan data pengumuman <strong>'.$judul.'</strong> berhasil disimpan.\');');

              }else{
                $update['judul_pengumuman']     = $judul;
                $update['url']                  = url_title(strtolower($judul));
                $update['isi_pengumuman']       = $isi;
                $update['tags_pengumuman']      = $tags;
                $update['aktif']                = $aktif;
                $update['last_data_update']     = $last_data_update;
                $update['id_user_update']       = $id_user_update;
                $this->db->update("tbl_pengumuman",$update,$id);
                //deklarasi session flashdata
                $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update Data Sukses\',\'Perubahan data agenda <strong>'.$judul.'</strong> berhasil disimpan.\');');
              }

      redirect('admin/info/pengumuman');
  }

  public function delete($id_pengumuman)
  {

    // mencegah user yang belum login untuk mengakses halaman ini
    $this->pondokkode->restrict();
    // cek apakah status user aktif atau tidak, jika tidak akan ke redirect halaman login
    $this->pondokkode->status_aktif($aktif=0);
    $id_pengumuman = $this->encryption->decode($id_pengumuman);
    $query = $this->db->query("SELECT judul_pengumuman FROM tbl_pengumuman WHERE id_pengumuman='$id_pengumuman'")->row();
    $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Hapus Data Sukses\',\'Hapus data pengumuman dengan judul: <strong>'.$query->judul_agenda.'</strong> berhasil.\');');
    $id['id_pengumuman'] = $id_pengumuman;
    $this->db->delete("tbl_pengumuman",$id);
    redirect("admin/info/pengumuman");
  }

}
