<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class siswa extends MX_Controller {

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
    $data['data_js'] = "";
    // Import JS Readey
    $data['js_ready'] = "";
    //page title
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Siswa";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Akademik ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Siswa ', '#','');
    // filter record user
    $filter['data_siswa'] = $this->session->userdata("data_siswa");
    // generate user
    $data['data_siswa'] = $this->pondokkode_model_admin->generate_siswa($this->config->item("limit_10"),$uri,$filter);
    //loadpagination
    $data['paging'] = $this->pagination->create_links();
    // Set search by nama / username/ id user
    $sess['data_siswa'] = $this->input->post("data_siswa");
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
    $data['akademik']    = "active";
    $data['guru']        = "";
    $data['siswa']       = "active";
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
                      $this->load->view('akademik/siswa/data_siswa');
                      $this->load->view('footer');
  }

  public function search()
	{
		    // mencegah user yang belum login untuk mengakses halaman ini
			$this->pondokkode->restrict();
		    // Set search by nama sistem
			$sess['data_siswa'] = mysql_escape_string($this->input->post("data_siswa"));
			$this->session->set_userdata($sess);
			redirect("admin/akademik/siswa");
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
    $data['data_js'] = "";
    // Import JS Readey
    $data['js_ready'] = "";
    //page title
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Siswa";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Akademik ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Siswa ',  base_url().'admin/akademik/siswa','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Tambah ', '#','');
    // deklarasi variabel form user
    $data['tipe'] = "tambah";
    $data['nisn'] = "";
    $data['readonly'] = "";
    $data['nis'] = "";
    $data['nama'] = "";
    $data['help_pass'] = "<span class='help-block'></span>";
    $data['jenis_kelamin'] = "";
    $data['tempat_tanggal_lahir'] = "";
    $data['alamat'] = "";
    $data['kelas'] = "";
    $data['agama'] = "";
    $data['foto'] = "foto";
    $data['frame_foto'] = "".base_url()."assets/foto_siswa/no_image.png";
    $data['foto_siswa_value'] = "foto";
    $data['nama_form'] = "form_siswa";
    $data['valu_submit'] = "Simpan";
    //active menu sidebar
    $data['dashboard']   = "";
    $data['posting']     = "";
    $data['artikel']     = "";
    $data['berita']      = "";
    $data['kategori']    = "";
    $data['info_agenda'] = "";
    $data['agenda']      = "";
    $data['pengumuman']  = "";
    $data['akademik']    = "active";
    $data['guru']        = "";
    $data['siswa']       = "active";
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
                      $this->load->view('akademik/siswa/form_siswa');
                      $this->load->view('footer');
  }

  public function edit($nisn)
  {
    // mencegah user yang belum login untuk mengakses halaman ini
    $this->pondokkode->restrict();
    // load model 'admin_model'
    $this->load->model('pondokkode_model_admin');
    //cek apakah user aktif ?
    $this->pondokkode->status_aktif($aktif=0);
    // Import JS
    $data['data_js'] = "";
    // Import JS Readey
    $data['js_ready'] = "";
    //page title
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Siswa";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Akademik ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Siswa ',  base_url().'admin/akademik/siswa','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Edit ', '#','');
    //get detail siswa
    $get_data_siswa = $this->pondokkode_model_admin->get_detail_siswa($this->encryption->decode($nisn));
    $get_siswa = $get_data_siswa->row();
    // deklarasi variabel form siswa
    $data['tipe'] = "edit";
    $data['nisn'] = $get_siswa->nisn;
    $data['readonly'] = "readonly";
    $data['nis'] = $get_siswa->nis;
    $data['nama'] = $get_siswa->nama;
    $data['help_pass'] = "<span class='help-block'></span>";
    $data['jenis_kelamin'] = $get_siswa->jenis_kelamin;
    $data['tempat_tanggal_lahir'] = $get_siswa->tempat_tanggal_lahir;
    $data['alamat'] = $get_siswa->alamat;
    $data['kelas'] = $get_siswa->kelas;
    $data['agama'] = $get_siswa->agama;
    $data['foto'] = "foto_siswa_edit";
    if($get_siswa->foto=="")
    {
      $data['frame_foto'] = "".base_url()."assets/foto_siswa/no_image.png";
    }else{
      $data['frame_foto'] = "".base_url()."assets/foto_siswa/200/".$get_siswa->foto."";
    }
    $data['foto_siswa_value'] = $get_siswa->foto;
    $data['nama_form'] = "form_siswa_edit";
    $data['valu_submit'] = "update";
    //active menu sidebar
    $data['dashboard']   = "";
    $data['posting']     = "";
    $data['artikel']     = "";
    $data['berita']      = "";
    $data['kategori']    = "";
    $data['info_agenda'] = "";
    $data['agenda']      = "";
    $data['pengumuman']  = "";
    $data['akademik']    = "active";
    $data['guru']        = "";
    $data['siswa']       = "active";
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
                      $this->load->view('akademik/siswa/form_siswa');
                      $this->load->view('footer');
  }

  public function simpan()
  {
    $this->pondokkode->restrict();
    $this->pondokkode->status_aktif($aktif=0);
    //tangkap dari post
    $tipe          = $this->input->post("tipe");
    $nisn['nisn']  = $this->input->post("nisn");
    $nis           = $this->input->post("nis");
    $nama          = $this->input->post("nama");
    $password      = $this->input->post("re_password");
    $foto          = $this->input->post("foto_siswa_value");
    $jenis_kelamin = $this->input->post("jenis_kelamin");
    $tempat_tanggal_lahir   = $this->input->post("tempat_tanggal_lahir");
    $alamat        = $this->input->post("alamat");
    $kelas = $this->input->post("kelas");
    $agama = $this->input->post("agama");
    if($tipe=="tambah")
    {
        // mencegah user mengakses menu yang tidak boleh dia buka
        //$this->auth->cek_menu(5);
        if(empty($_FILES['foto']['name']))
        {
            // Simpan ke tabel user
            $insert['nisn']      = $this->input->post("nisn");
            $insert['nis']       = $nis;
            $insert['nama']      = $nama;
            $insert['password']  = md5($password);
            $insert['jenis_kelamin'] = $jenis_kelamin;
            $insert['tempat_tanggal_lahir'] = $tempat_tanggal_lahir;
            $insert['alamat'] = $alamat;
            $insert['kelas']  = $kelas;
            $insert['agama']  = $agama;
            $insert['last_data_update'] = date("Y-m-d H:i:s");
            $insert['id_user_update'] = $this->session->userdata('user_id');
            $this->db->insert("tbl_siswa",$insert);
            // Pesan berhasil simpan
            $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Simpan Data Sukses\',\'Penambahan data siswa <strong>'.$nama.'</strong>  berhasil disimpan.\');');
            redirect('admin/akademik/siswa');
        }else{
            $config['upload_path'] = './assets/foto_siswa/';
            $config['allowed_types']= 'jpg|png|jpeg';
            $config['encrypt_name']	= TRUE;
            $config['remove_spaces']	= TRUE;
            $config['overwrite']        = TRUE;
            $config['max_size']         = '5000';
            $config['max_width']  	= '5000';
            $config['max_height']  	= '5000';

            $this->load->library('upload', $config);
            $this->load->library('image_lib');

            $this->upload->initialize($config);

            if ($this->upload->do_upload("foto")) {
                $data_upload	 	= $this->upload->data();

                /* PATH */
                $source             = "./assets/foto_siswa/".$data_upload['file_name'] ;
                $destination_thumb	= "./assets/foto_siswa/200/" ;

                // Permission Configuration
                chmod($source, 0777) ;

                /* Resizing Processing */
                // Configuration Of Image Manipulation :: Static
                $img['image_library'] = 'GD2';
                $img['create_thumb']  = TRUE;
                $img['maintain_ratio']= TRUE;

                /// Limit Width Resize
                $limit_thumb    = 350 ;

                // Size Image Limit was using (LIMIT TOP)
                $limit_use  = $data_upload['image_width'] > $data_upload['image_height'] ? $data_upload['image_width'] : $data_upload['image_height'] ;

                // Percentase Resize
                if ($limit_use > $limit_thumb) {
                    $percent_thumb  = $limit_thumb/$limit_use ;
                }

                //// Making THUMBNAIL ///////
                $img['width']  = $limit_use > $limit_thumb ?  $data_upload['image_width'] * $percent_thumb : $data_upload['image_width'] ;
                $img['height'] = $limit_use > $limit_thumb ?  $data_upload['image_height'] * $percent_thumb : $data_upload['image_height'] ;

                // Configuration Of Image Manipulation :: Dynamic
                $img['thumb_marker'] = '';
                $img['quality']      = '100%' ;
                $img['source_image'] = $source ;
                $img['new_image']    = $destination_thumb ;

                // Do Resizing
                $this->image_lib->initialize($img);
                $this->image_lib->resize();
                $this->image_lib->clear() ;

                // Simpan ke tabel user
                $insert['nisn'] = $this->input->post("nisn");
                $insert['nis']  = $this->input->post("nis");
                $insert['foto'] = $data_upload['file_name'];
                $insert['nama'] = $nama;
                $insert['password'] = md5($password);
                $insert['jenis_kelamin'] = $jenis_kelamin;
                $insert['tempat_tanggal_lahir'] = $tempat_tanggal_lahir;
                $insert['alamat'] = $alamat;
                $insert['kelas']  = $kelas;
                $insert['agama'] = $agama;
                $insert['last_data_update'] = date("Y-m-d H:i:s");
                $insert['id_user_update'] = $this->session->userdata('user_id');
                $this->db->insert("tbl_siswa",$insert);
                unlink($source);

                // Pesan berhasil simpan
                $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Simpan Data Sukses\',\'Penambahan data siswa <strong>'.$nama.'</strong>  berhasil disimpan.\');');
                redirect('admin/akademik/siswa');
            }else{
                $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'error\',\'Simpan Data Gagal\',\''.$this->upload->display_errors('<p>','</p>').'\');');
                redirect('admin/akademik/siswa');
            }
        }
    }elseif($tipe=="edit"){
    // mencegah user mengakses menu yang tidak boleh dia buka
    if($password=="")
    {
      if(empty($_FILES['foto_siswa_edit']['name']))
      {
        // Simpan ke tabel user
        //$update['nisn'] = $nisn;
        $update['nis']  = $this->input->post("nis");
        $update['nama'] = $nama;
        $update['jenis_kelamin'] = $jenis_kelamin;
        $update['tempat_tanggal_lahir'] = $tempat_tanggal_lahir;
        $update['alamat'] = $alamat;
        $update['kelas'] = $kelas;
        $update['agama'] = $agama;
        $update['last_data_update'] = date("Y-m-d H:i:s");
        $update['id_user_update'] = $this->session->userdata('user_id');
        $this->db->update("tbl_siswa",$update,$nisn);
        // Pesan berhasil simpan
        $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update Data Sukses\',\'Perubahan data siswa <strong>'.$nama.'</strong> berhasil disimpan.\');');
        redirect('admin/akademik/siswa');
      }else{
        $config['upload_path'] = './assets/foto_siswa/';
        $config['allowed_types']= 'jpg|png|jpeg';
        $config['encrypt_name']	= TRUE;
        $config['remove_spaces']	= TRUE;
        $config['overwrite']        = TRUE;
        $config['max_size']         = '5000';
        $config['max_width']  	= '5000';
        $config['max_height']  	= '5000';
        $this->load->library('upload', $config);
        $this->load->library('image_lib');

        $this->upload->initialize($config);

        if ($this->upload->do_upload("foto_siswa_edit")) {
            $data_upload	 	= $this->upload->data();
        /* PATH */
        $source             = "./assets/foto_siswa/".$data_upload['file_name'] ;
        $destination_thumb	= "./assets/foto_siswa/200/" ;
        $source_old             = "./assets/foto_siswa/200/".$foto."" ;
        // Permission Configuration
        chmod($source, 0777) ;
        /* Resizing Processing */
        // Configuration Of Image Manipulation :: Static
        $img['image_library'] = 'GD2';
        $img['create_thumb']  = TRUE;
        $img['maintain_ratio']= TRUE;
        /// Limit Width Resize
        $limit_thumb    = 350 ;
        // Size Image Limit was using (LIMIT TOP)
        $limit_use  = $data_upload['image_width'] > $data_upload['image_height'] ? $data_upload['image_width'] : $data_upload['image_height'] ;
        // Percentase Resize
        if ($limit_use > $limit_thumb) {
          $percent_thumb  = $limit_thumb/$limit_use ;
        }
        //// Making THUMBNAIL ///////
        $img['width']  = $limit_use > $limit_thumb ?  $data_upload['image_width'] * $percent_thumb : $data_upload['image_width'] ;
        $img['height'] = $limit_use > $limit_thumb ?  $data_upload['image_height'] * $percent_thumb : $data_upload['image_height'] ;
        // Configuration Of Image Manipulation :: Dynamic
        $img['thumb_marker'] = '';
        $img['quality']      = '100%' ;
        $img['source_image'] = $source ;
        $img['new_image']    = $destination_thumb ;

        // Do Resizing
        $this->image_lib->initialize($img);
        $this->image_lib->resize();
        $this->image_lib->clear() ;

        // Update ke tabel user
        //$update['nisn'] = $nisn;
        $update['nis']  = $this->input->post("nis");
        $update['nama'] = $nama;
        $update['foto']   = $data_upload['file_name'];
        $update['jenis_kelamin'] = $jenis_kelamin;
        $update['tempat_tanggal_lahir'] = $tempat_tanggal_lahir;
        $update['alamat'] = $alamat;
        $update['kelas'] = $kelas;
        $update['agama'] = $agama;
        $update['last_data_update'] = date("Y-m-d H:i:s");
        $update['id_user_update'] = $this->session->userdata('user_id');
        $this->db->update("tbl_siswa",$update,$nisn);
        unlink($source);
        unlink($source_old);
        // Pesan berhasil simpan
        $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update Data Sukses\',\'Perubahan data siswa <strong>'.$nama.'</strong> berhasil disimpan.\');');
        redirect('admin/akademik/siswa');
        }else{
        $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'error\',\'Update Data Gagal\',\''.$this->upload->display_errors('<p>','</p>').'\');');
        redirect('admin/akademik/siswa');
        }
        }
      }else{
        if(empty($_FILES['foto_siswa_edit']['name']))
        {
        // Simpan ke tabel
        $update['nis']  = $this->input->post("nis");
        $update['nama'] = $nama;
        $update['password'] = md5($password);
        //$update['foto']   = $data_upload['file_name'];
        $update['jenis_kelamin'] = $jenis_kelamin;
        $update['tempat_tanggal_lahir'] = $tempat_tanggal_lahir;
        $update['alamat'] = $alamat;
        $update['kelas'] = $kelas;
        $update['agama'] = $agama;
        $update['last_data_update'] = date("Y-m-d H:i:s");
        $update['id_user_update'] = $this->session->userdata('user_id');
        $this->db->update("tbl_siswa",$update,$nisn);
        // Pesan berhasil simpan
        $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update Data Sukses\',\'Perubahan data siswa <strong>'.$nama.'</strong> berhasil disimpan.\');');
        redirect('admin/akademik/siswa');
        }else{
        $config['upload_path'] = './assets/foto_siswa/';
        $config['allowed_types']= 'jpg|png|jpeg';
        $config['encrypt_name']	= TRUE;
        $config['remove_spaces']	= TRUE;
        $config['overwrite']        = TRUE;
        $config['max_size']         = '5000';
        $config['max_width']  	= '5000';
        $config['max_height']  	= '5000';

        $this->load->library('upload', $config);
        $this->load->library('image_lib');

        $this->upload->initialize($config);

        if ($this->upload->do_upload("foto_siswa_edit")) {
            $data_upload	 	= $this->upload->data();

            /* PATH */
            $source             = "./assets/foto_siswa/".$data_upload['file_name'] ;
            $destination_thumb	= "./assets/foto_siswa/200/" ;
            $source_old             = "./assets/foto_siswa/200/".$foto."" ;
            // Permission Configuration
            chmod($source, 0777) ;

            /* Resizing Processing */
            // Configuration Of Image Manipulation :: Static
            $img['image_library'] = 'GD2';
            $img['create_thumb']  = TRUE;
            $img['maintain_ratio']= TRUE;

            /// Limit Width Resize
            $limit_thumb    = 350 ;

            // Size Image Limit was using (LIMIT TOP)
            $limit_use  = $data_upload['image_width'] > $data_upload['image_height'] ? $data_upload['image_width'] : $data_upload['image_height'] ;

            // Percentase Resize
            if ($limit_use > $limit_thumb) {
                $percent_thumb  = $limit_thumb/$limit_use ;
            }

            //// Making THUMBNAIL ///////
            $img['width']  = $limit_use > $limit_thumb ?  $data_upload['image_width'] * $percent_thumb : $data_upload['image_width'] ;
            $img['height'] = $limit_use > $limit_thumb ?  $data_upload['image_height'] * $percent_thumb : $data_upload['image_height'] ;

            // Configuration Of Image Manipulation :: Dynamic
            $img['thumb_marker'] = '';
            $img['quality']      = '100%' ;
            $img['source_image'] = $source ;
            $img['new_image']    = $destination_thumb ;

            // Do Resizing
            $this->image_lib->initialize($img);
            $this->image_lib->resize();
            $this->image_lib->clear() ;

            // Simpan ke tabel
            $update['nis']  = $this->input->post("nis");
            $update['nama'] = $nama;
            $update['password'] = md5($password);
            $update['foto']   = $data_upload['file_name'];
            $update['jenis_kelamin'] = $jenis_kelamin;
            $update['tempat_tanggal_lahir'] = $tempat_tanggal_lahir;
            $update['alamat'] = $alamat;
            $update['kelas'] = $kelas;
            $update['agama'] = $agama;
            $update['last_data_update'] = date("Y-m-d H:i:s");
            $update['id_user_update'] = $this->session->userdata('user_id');
            $this->db->update("tbl_siswa",$update,$nisn);
            unlink($source);
            unlink($source_old);
            // Pesan berhasil simpan
            $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update Data Sukses\',\'Perubahan data siswa <strong>'.$nama.'</strong> berhasil disimpan.\');');
            redirect('admin/akademik/siswa');
        }else{
            $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'error\',\'Update Data Gagal\',\''.$this->upload->display_errors('<p>','</p>').'\');');
            redirect('admin/akademik/siswa');
        }
        }
      }
    }
  }

  public function delete($nisn)
  {

    // mencegah user yang belum login untuk mengakses halaman ini
    $this->pondokkode->restrict();
    // cek apakah status user aktif atau tidak, jika tidak akan ke redirect halaman login
    $this->pondokkode->status_aktif($aktif=0);
    $nisn = $this->encryption->decode($nisn);
    $query = $this->db->query("SELECT nama FROM tbl_siswa WHERE nisn='$nisn'")->row();
    $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Hapus Data Sukses\',\'Hapus data siswa dengan nama siswa: <strong>'.$query->nama.'</strong> berhasil.\');');
    $id['nisn'] = $nisn;
    $this->db->delete("tbl_siswa",$id);
    redirect("admin/akademik/siswa");
  }

  function cek_nisn()
  {
        $nisn = $_POST["nisn"];
        $query = $this->db->query("SELECT * FROM tbl_siswa WHERE nisn='$nisn'");
        if(($query->num_rows())>0)
        {
           echo "false";
        }else{
           echo "true";
        }
  }

  function cek_nis()
  {
        $nis = $_POST["nis"];
        $query = $this->db->query("SELECT nisn FROM tbl_siswa WHERE nis='$nis'");
        if(($query->num_rows())>0)
        {
           echo "false";
        }else{
           echo "true";
        }
  }

}
