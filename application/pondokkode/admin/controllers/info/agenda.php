<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class agenda extends MX_Controller {

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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Agenda";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Info ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Agenda ', '#','');
    // filter record berita
    $filter['data_agenda'] = $this->session->userdata("data_agenda");
    //generate data berita
    $data['data_agenda'] = $this->pondokkode_model_admin->generate_agenda($this->config->item("limit_10"),$uri,$filter);
    //loadpagination
    $data['paging'] = $this->pagination->create_links();
    // Set search by nama / username/ id user
    $sess['data_agenda'] = $this->input->post("data_agenda");
    $this->session->set_userdata($sess);
    //active menu sidebar
    $data['dashboard']   = "";
    $data['posting']     = "";
    $data['artikel']     = "";
    $data['berita']      = "";
    $data['kategori']    = "";
    $data['info_agenda'] = "active";
    $data['agenda']      = "active";
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
                      $this->load->view('info/agenda/data_agenda');
                      $this->load->view('footer');
  }

  public function search()
	{
		    // mencegah user yang belum login untuk mengakses halaman ini
			$this->pondokkode->restrict();
		    // Set search by nama sistem
			$sess['data_agenda'] = mysql_escape_string($this->input->post("data_agenda"));
			$this->session->set_userdata($sess);
			redirect("admin/info/agenda");
	}

  public function activated($id_agenda,$value)
	{
		//mencegah user yang belum login mengakses halaman ini
		$this->pondokkode->restrict();
		//cek apakah user aktif ?
    $id_agenda = $this->encryption->decode($id_agenda);
		$this->pondokkode->status_aktif($aktif=0);
		$id['id_agenda'] = $id_agenda;
		$update['aktif'] = $value;
		$this->db->update("tbl_agenda",$update,$id);
		$query = $this->db->query("SELECT judul_agenda FROM tbl_agenda WHERE id_agenda='$id_agenda'")->row();
		if($value==0)
		{
			$this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Penonaktifan Data Sukses\',\'Penonaktifan data agenda dengan judul agenda: <strong>'.$query->judul_agenda.'</strong> berhasil.\');');
		}else{
			$this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Pengaktifan Data Sukses\',\'Pengaktifan data agenda dengan judul agenda: <strong>'.$query->judul_agenda.'</strong> berhasil.\');');
		}
		redirect('admin/info/agenda');
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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Agenda";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Info ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Agenda ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Tambah ', '#','');
    //deklarasi form
    $data['tipe'] = "tambah";
    $data['id_agenda'] = "";
    $data['judul_agenda'] = "";
    $data['isi_agenda'] = "";
    $data['tags_agenda'] = "";
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
    $data['agenda']      = "active";
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
                      $this->load->view('info/agenda/form_agenda');
                      $this->load->view('footer');
  }

  public function edit($id_agenda)
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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Agenda";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Info ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Agenda ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Edit ', '#','');
    //get dwtail berita
    $data['detail_agenda'] = $this->pondokkode_model_admin->get_detail_agenda($this->encryption->decode($id_agenda));
    $get = $data['detail_agenda']->row();
    //deklarasi form
    $data['tipe'] = "edit";
    $data['id_agenda'] = $this->encryption->decode($id_agenda);
    $data['judul_agenda'] = $get->judul_agenda;
    $data['isi_agenda'] = $get->isi_agenda;
    $data['tags_agenda'] = $get->tags_agenda;
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
    $data['agenda']      = "active";
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
                      $this->load->view('info/agenda/form_agenda');
                      $this->load->view('footer');
  }

  public function simpan()
  {
  // mencegah user yang belum login untuk mengakses halaman ini
  $this->pondokkode->restrict();
  //cek apakah user aktif ?
  $this->pondokkode->status_aktif($aktif=0);
              $id['id_agenda'] = $this->input->post("id");
              $tipe  = $this->input->post("tipe");
              $judul = $this->input->post("judul");
              $isi   = $this->input->post("isi");
              $tags  = $this->input->post("tags");
              $aktif = 1;
              $last_data_update = date("Y-m-d H:i:s");
              $id_user_update   = $this->session->userdata('user_id');
              if ($tipe=="tambah"){
                  $insert['judul_agenda']     = $judul;
                  $insert['url']              = url_title(strtolower($judul));
                  $insert['isi_agenda']       = $isi;
                  $insert['tags_agenda']      = $tags;
                  $insert['aktif']            = $aktif;
                  $insert['tgl_publish']      = date("Y-m-d H:i:s");
                  $insert['last_data_update'] = $last_data_update;
                  $insert['id_user_update']   = $id_user_update;
                  $this->db->insert("tbl_agenda",$insert);
      //deklarasi session flashdata
      $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Simpan Data Sukses\',\'Penambahan data agenda <strong>'.$judul.'</strong> berhasil disimpan.\');');

              }else{
                $update['judul_agenda']     = $judul;
                $update['url']              = url_title(strtolower($judul));
                $update['isi_agenda']       = $isi;
                $update['tags_agenda']      = $tags;
                $update['aktif']            = $aktif;
                $update['last_data_update'] = $last_data_update;
                $update['id_user_update']   = $id_user_update;
                $this->db->update("tbl_agenda",$update,$id);
      //deklarasi session flashdata
      $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update Data Sukses\',\'Perubahan data agenda <strong>'.$judul.'</strong> berhasil disimpan.\');');
              }

      redirect('admin/info/agenda');
  }

  public function delete($id_agenda)
  {

    // mencegah user yang belum login untuk mengakses halaman ini
    $this->pondokkode->restrict();
    // cek apakah status user aktif atau tidak, jika tidak akan ke redirect halaman login
    $this->pondokkode->status_aktif($aktif=0);
    $id_agenda = $this->encryption->decode($id_agenda);
    $query = $this->db->query("SELECT judul_agenda FROM tbl_agenda WHERE id_agenda='$id_agenda'")->row();
    $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Hapus Data Sukses\',\'Hapus data agenda dengan judul: <strong>'.$query->judul_agenda.'</strong> berhasil.\');');
    $id['id_agenda'] = $id_agenda;
    $this->db->delete("tbl_agenda",$id);
    redirect("admin/info/agenda");
  }

}
