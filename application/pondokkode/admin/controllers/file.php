<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class file extends MX_Controller {

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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> File";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','File ', '#','');
    // filter record berita
    $filter['data_file'] = $this->session->userdata("data_file");
    //generate data berita
    $data['data_file'] = $this->pondokkode_model_admin->generate_file($this->config->item("limit_10"),$uri,$filter);
    //loadpagination
    $data['paging'] = $this->pagination->create_links();
    // Set search by nama / username/ id user
    $sess['data_file'] = $this->input->post("data_file");
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
    $data['konten']      = "";
    $data['pages']       = "";
    $data['menu']        = "";
    $data['file']        = "active";
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
                      $this->load->view('file/data_file');
                      $this->load->view('footer');
  }

  public function search()
	{
		    // mencegah user yang belum login untuk mengakses halaman ini
			$this->pondokkode->restrict();
		    // Set search by nama sistem
			$sess['data_file'] = mysql_escape_string($this->input->post("data_file"));
			$this->session->set_userdata($sess);
			redirect("admin/file");
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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> File";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','File ', base_url().'admin/file','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Tambah ', '#','');
    $data['tipe'] = "tambah";
    $data['id_file'] = "";
    $data['judul_file'] = "";
    $data['nama_file'] = "";
    $data['namafile'] = "";
    $data['nama_form'] = "form_file";
    $data['last_data_update'] = "";
    $data['id_user_update'] = "";
    $data['button'] = "Simpan";
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
    $data['konten']      = "";
    $data['pages']       = "";
    $data['menu']        = "";
    $data['file']        = "active";
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
                      $this->load->view('file/form_file');
                      $this->load->view('footer');
  }

  public function edit($id_file)
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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> File";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','File ', base_url().'admin/file','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Edit ', '#','');
    $get_file = $this->pondokkode_model_admin->get_detail_file($this->encryption->decode($id_file));
    $get = $get_file->row();
    $data['tipe'] = "";
    $data['id_file'] = $this->encryption->decode($id_file);
    $data['judul_file'] = $get->judul_file;
    $data['nama_file'] = $get->nama_file;
    $data['namafile'] = $get->nama_file;
    $data['nama_form'] = "form_file_edit";
    $data['last_data_update'] = "";
    $data['id_user_update'] = "";
    $data['button'] = "update";
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
    $data['konten']      = "";
    $data['pages']       = "";
    $data['menu']        = "";
    $data['file']        = "active";
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
                      $this->load->view('file/form_file');
                      $this->load->view('footer');
  }

  function simpan()
  {
    // mencegah user yang belum login untuk mengakses halaman ini
    $this->pondokkode->restrict();
    // cek apakah status user aktif atau tidak, jika tidak akan ke redirect halaman login
    $this->pondokkode->status_aktif($aktif=0);

    $tipe = $this->input->post("tipe");
    $id['id_file'] = $this->input->post("id");
    if($tipe=="tambah")
    {
              $config['upload_path'] = './assets/file_download/';
              $allowed_types = 'pdf|doc|zip|rar';
              $config['allowed_types'] = substr($allowed_types, strpos($allowed_types, substr($_FILES['userfile']['name'], -3)), 3);
              $config['max_size']	= '10000';
              $config['encrypt_name']	= TRUE;
              $config['remove_spaces']	= TRUE;
              $this->load->library('upload', $config);

              $this->load->library('upload', $config);

              $this->upload->initialize($config);
              if ( ! $this->upload->do_upload())
              {
                  $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'error\',\'Upload file Gagal\',\''.$this->upload->display_errors('<p>','</p>').'\');');
                  redirect("admin/file/tambah");
              }
              else
              {
                  $upload_data = $this->upload->data();

                  $insert['judul_file'] = $this->input->post("judul_file");
                  $insert['nama_file'] = $upload_data['file_name'];
                  $insert['tgl_publish'] = date("Y-m-d H:i:s");
                  $insert['last_data_update'] = date("Y-m-d H:i:s");
                  $insert['id_user_update'] = $this->session->userdata('user_id');
                  $this->db->insert("tbl_file",$insert);
                  $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Upload File Sukses\',\'Upload file <strong>'.$this->input->post("judul_file").'</strong> berhasil.\');');
                  redirect("admin/file");
              }
          }else{
                  if(empty($_FILES['userfile']['name']))
          {
            $update['judul_file'] = $this->input->post("judul_file");
            $this->db->update("tbl_file",$update,$id);
            $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update File Sukses\',\'Update file <strong>'.$this->input->post("judul_file").'</strong> berhasil.\');');
            redirect("admin/file");
          }
          else
          {
            $config['upload_path'] = './assets/file_download/';
            $allowed_types = 'pdf|doc|zip|rar';
            $config['allowed_types'] = substr($allowed_types, strpos($allowed_types, substr($_FILES['userfile']['name'], -3)), 3);
            $config['max_size']	= '10000';
            $config['encrypt_name']	= TRUE;
            $config['remove_spaces']	= TRUE;
            $this->load->library('upload', $config);

            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload())
            {
              $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'error\',\'Update file Gagal\',\''.$this->upload->display_errors('<p>','</p>').'\');');
              redirect("admin/file");
            }
            else
            {
              $path = "./assets/file_download/".$this->input->post('namafile')."";
              if (file_exists($path))
              {
                unlink($path);
              }
              $upload_data = $this->upload->data();

              $update['judul_file'] = $this->input->post("judul_file");
                                                  $update['nama_file'] = $upload_data['file_name'];
                                                  $update['last_data_update'] = date("Y-m-d H:i:s");
                                                  $update['id_user_update'] = $this->session->userdata('user_id');
                                                  $this->db->update("tbl_file",$update,$id);
                                                  $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update File Sukses\',\'Update file <strong>'.$this->input->post("judul_file").'</strong> berhasil.\');');
                                                  redirect("admin/file");
            }
          }
        }
      }

    public function delete($id_file,$file)
    {
      $path = "./assets/file_download/".$file."";
      if (file_exists($path))
      {
        unlink($path);
      }
      $where['id_file'] = $this->encryption->decode($id_file);
      $this->db->delete("tbl_file",$where);
      $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Hapus File Sukses\',\'Hapus file berhasil.\');');
      redirect("admin/file");
     }

}
