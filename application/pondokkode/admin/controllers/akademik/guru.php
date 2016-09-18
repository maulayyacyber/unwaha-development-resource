<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class guru extends MX_Controller {

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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Guru";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Akademik ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Guru ', '#','');
    // filter record user
    $filter['data_guru'] = $this->session->userdata("data_guru");
    // generate user
    $data['data_guru'] = $this->pondokkode_model_admin->generate_guru($this->config->item("limit_10"),$uri,$filter);
    //loadpagination
    $data['paging'] = $this->pagination->create_links();
    // Set search by nama / username/ id user
    $sess['data_guru'] = $this->input->post("data_guru");
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
    $data['guru']        = "active";
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
                      $this->load->view('akademik/guru/data_guru');
                      $this->load->view('footer');
  }

  public function search()
	{
		    // mencegah user yang belum login untuk mengakses halaman ini
			$this->pondokkode->restrict();
		    // Set search by nama sistem
			$sess['data_guru'] = mysql_escape_string($this->input->post("data_guru"));
			$this->session->set_userdata($sess);
			redirect("admin/akademik/guru");
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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Guru";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Akademik ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Guru ',  base_url().'admin/akademik/guru','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Tambah ', '#','');
    // deklarasi variabel form user
    $data['tipe'] = "tambah";
    $data['nip'] = "";
    $data['readonly'] = "";
    $data['nama'] = "";
    $data['help_pass'] = "<span class='help-block'></span>";
    $data['jenis_kelamin'] = "";
    $data['tempat_tanggal_lahir'] = "";
    $data['alamat'] = "";
    $data['no_telp'] = "";
    $data['email'] = "";
    $data['jabatan'] = "";
    $data['agama'] = "";
    $data['foto'] = "foto";
    $data['frame_foto'] = "".base_url()."assets/foto_siswa/no_image.png";
    $data['foto_guru_value'] = "foto";
    $data['nama_form'] = "form_guru";
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
    $data['guru']        = "active";
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
                      $this->load->view('akademik/guru/form_guru');
                      $this->load->view('footer');
  }

  public function edit($nip)
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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Guru";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Akademik ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Guru ',  base_url().'admin/akademik/guru','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Edit ', '#','');
    //get detail siswa
    $get_data_guru = $this->pondokkode_model_admin->get_detail_guru($this->encryption->decode($nip));
    $get_guru = $get_data_guru->row();
    // deklarasi variabel form siswa
    $data['tipe'] = "edit";
    $data['nip'] = $get_guru->nip;
    $data['readonly'] = "readonly";
    $data['nama'] = $get_guru->nama;
    $data['help_pass'] = "<span class='help-block'></span>";
    $data['jenis_kelamin'] = $get_guru->jenis_kelamin;
    $data['tempat_tanggal_lahir'] = $get_guru->tempat_tanggal_lahir;
    $data['alamat'] = $get_guru->alamat;
    $data['jabatan'] = $get_guru->jabatan;
    $data['agama'] = $get_guru->agama;
    $data['email'] = $get_guru->email;
    $data['no_telp'] = $get_guru->no_telp;
    $data['foto'] = "foto_guru_edit";
    if($get_guru->foto=="")
    {
      $data['frame_foto'] = "".base_url()."assets/foto_guru/no_image.png";
    }else{
      $data['frame_foto'] = "".base_url()."assets/foto_guru/200/".$get_guru->foto."";
    }
    $data['foto_guru_value'] = $get_guru->foto;
    $data['nama_form'] = "form_guru_edit";
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
    $data['guru']        = "active";
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
                      $this->load->view('akademik/guru/form_guru');
                      $this->load->view('footer');
  }

  public function simpan()
  {
    $this->pondokkode->restrict();
    $this->pondokkode->status_aktif($aktif=0);
    //tangkap dari post
    $tipe          = $this->input->post("tipe");
    $nip['nip']  = $this->input->post("nip");
    $nama          = $this->input->post("nama");
    $password      = $this->input->post("re_password");
    $foto          = $this->input->post("foto_guru_value");
    $jenis_kelamin = $this->input->post("jenis_kelamin");
    $tempat_tanggal_lahir   = $this->input->post("tempat_tanggal_lahir");
    $alamat        = $this->input->post("alamat");
    $jabatan = $this->input->post("jabatan");
    $agama = $this->input->post("agama");
    $email = $this->input->post("email");
    $no_telp = $this->input->post("no_telp");
    if($tipe=="tambah")
    {
        // mencegah user mengakses menu yang tidak boleh dia buka
        //$this->auth->cek_menu(5);
        if(empty($_FILES['foto']['name']))
        {
            // Simpan ke tabel user
            $insert['nip']      = $this->input->post("nip");
            $insert['nama']      = $nama;
            $insert['password']  = md5($password);
            $insert['jenis_kelamin'] = $jenis_kelamin;
            $insert['tempat_tanggal_lahir'] = $tempat_tanggal_lahir;
            $insert['alamat'] = $alamat;
            $insert['agama']  = $agama;
            $insert['email']  = $email;
            $insert['jabatan']= $jabatan;
            $insert['no_telp']= $no_telp;
            $insert['last_data_update'] = date("Y-m-d H:i:s");
            $insert['id_user_update'] = $this->session->userdata('user_id');
            $this->db->insert("tbl_guru",$insert);
            // Pesan berhasil simpan
            $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Simpan Data Sukses\',\'Penambahan data guru <strong>'.$nama.'</strong>  berhasil disimpan.\');');
            redirect('admin/akademik/guru');
        }else{
            $config['upload_path'] = './assets/foto_guru/';
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
                $source             = "./assets/foto_guru/".$data_upload['file_name'] ;
                $destination_thumb	= "./assets/foto_guru/200/" ;

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
                $insert['nip'] = $this->input->post("nip");
                $insert['foto'] = $data_upload['file_name'];
                $insert['nama'] = $nama;
                $insert['password'] = md5($password);
                $insert['jenis_kelamin'] = $jenis_kelamin;
                $insert['tempat_tanggal_lahir'] = $tempat_tanggal_lahir;
                $insert['alamat'] = $alamat;
                $insert['agama'] = $agama;
                $insert['email'] = $email;
                $insert['no_telp'] = $no_telp;
                $insert['jabatan'] = $jabatan;
                $insert['last_data_update'] = date("Y-m-d H:i:s");
                $insert['id_user_update'] = $this->session->userdata('user_id');
                $this->db->insert("tbl_guru",$insert);
                unlink($source);

                // Pesan berhasil simpan
                $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Simpan Data Sukses\',\'Penambahan data guru <strong>'.$nama.'</strong>  berhasil disimpan.\');');
                redirect('admin/akademik/guru');
            }else{
                $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'error\',\'Simpan Data Gagal\',\''.$this->upload->display_errors('<p>','</p>').'\');');
                redirect('admin/akademik/guru');
            }
        }
    }elseif($tipe=="edit"){
    // mencegah user mengakses menu yang tidak boleh dia buka
    if($password=="")
    {
      if(empty($_FILES['foto_guru_edit']['name']))
      {
        // Simpan ke tabel user
        //$update['nisn'] = $nisn;
        //$update['nip']  = $this->input->post("nip");
        $update['nama'] = $nama;
        $update['jenis_kelamin'] = $jenis_kelamin;
        $update['tempat_tanggal_lahir'] = $tempat_tanggal_lahir;
        $update['alamat'] = $alamat;
        $update['agama'] = $agama;
        $update['email'] = $email;
        $update['no_telp'] = $no_telp;
        $update['jabatan'] = $jabatan;
        $update['last_data_update'] = date("Y-m-d H:i:s");
        $update['id_user_update'] = $this->session->userdata('user_id');
        $this->db->update("tbl_guru",$update,$nip);
        // Pesan berhasil simpan
        $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update Data Sukses\',\'Perubahan data guru <strong>'.$nama.'</strong> berhasil disimpan.\');');
        redirect('admin/akademik/guru');
      }else{
        $config['upload_path'] = './assets/foto_guru/';
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

        if ($this->upload->do_upload("foto_guru_edit")) {
            $data_upload	 	= $this->upload->data();
        /* PATH */
        $source             = "./assets/foto_guru/".$data_upload['file_name'] ;
        $destination_thumb	= "./assets/foto_guru/200/" ;
        $source_old             = "./assets/foto_guru/200/".$foto."" ;
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
        //$update['nip']  = $this->input->post("nip");
        $update['nama'] = $nama;
        $update['foto']   = $data_upload['file_name'];
        $update['jenis_kelamin'] = $jenis_kelamin;
        $update['tempat_tanggal_lahir'] = $tempat_tanggal_lahir;
        $update['alamat'] = $alamat;
        $update['agama'] = $agama;
        $update['jabatan'] = $jabatan;
        $update['email'] = $email;
        $update['no_telp'] = $no_telp;
        $update['last_data_update'] = date("Y-m-d H:i:s");
        $update['id_user_update'] = $this->session->userdata('user_id');
        $this->db->update("tbl_guru",$update,$nip);
        unlink($source);
        unlink($source_old);
        // Pesan berhasil simpan
        $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update Data Sukses\',\'Perubahan data guru <strong>'.$nama.'</strong> berhasil disimpan.\');');
        redirect('admin/akademik/guru');
        }else{
        $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'error\',\'Update Data Gagal\',\''.$this->upload->display_errors('<p>','</p>').'\');');
        redirect('admin/akademik/guru');
        }
        }
      }else{
        if(empty($_FILES['foto_guru_edit']['name']))
        {
        // Simpan ke tabel
        //$update['nip']  = $this->input->post("nip");
        $update['nama'] = $nama;
        $update['password'] = md5($password);
        //$update['foto']   = $data_upload['file_name'];
        $update['jenis_kelamin'] = $jenis_kelamin;
        $update['tempat_tanggal_lahir'] = $tempat_tanggal_lahir;
        $update['alamat'] = $alamat;
        $update['agama'] = $agama;
        $update['jabatan'] = $jabatan;
        $update['email'] = $email;
        $update['no_telp'] = $no_telp;
        $update['last_data_update'] = date("Y-m-d H:i:s");
        $update['id_user_update'] = $this->session->userdata('user_id');
        $this->db->update("tbl_guru",$update,$nip);
        // Pesan berhasil simpan
        $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update Data Sukses\',\'Perubahan data guru <strong>'.$nama.'</strong> berhasil disimpan.\');');
        redirect('admin/akademik/guru');
        }else{
        $config['upload_path'] = './assets/foto_guru/';
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

        if ($this->upload->do_upload("foto_guru_edit")) {
            $data_upload	 	= $this->upload->data();

            /* PATH */
            $source             = "./assets/foto_guru/".$data_upload['file_name'] ;
            $destination_thumb	= "./assets/foto_guru/200/" ;
            $source_old             = "./assets/foto_guru/200/".$foto."" ;
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
            //$update['nip']  = $this->input->post("nip");
            $update['nama'] = $nama;
            $update['password'] = md5($password);
            $update['foto']   = $data_upload['file_name'];
            $update['jenis_kelamin'] = $jenis_kelamin;
            $update['tempat_tanggal_lahir'] = $tempat_tanggal_lahir;
            $update['alamat'] = $alamat;
            $update['agama'] = $agama;
            $update['email'] = $email;
            $update['no_telp'] = $no_telp;
            $update['jabatan'] = $jabatan;
            $update['last_data_update'] = date("Y-m-d H:i:s");
            $update['id_user_update'] = $this->session->userdata('user_id');
            $this->db->update("tbl_guru",$update,$nip);
            unlink($source);
            unlink($source_old);
            // Pesan berhasil simpan
            $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update Data Sukses\',\'Perubahan data guru <strong>'.$nama.'</strong> berhasil disimpan.\');');
            redirect('admin/akademik/guru');
        }else{
            $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'error\',\'Update Data Gagal\',\''.$this->upload->display_errors('<p>','</p>').'\');');
            redirect('admin/akademik/guru');
        }
        }
      }
    }
  }

  public function delete($nip)
  {

    // mencegah user yang belum login untuk mengakses halaman ini
    $this->pondokkode->restrict();
    // cek apakah status user aktif atau tidak, jika tidak akan ke redirect halaman login
    $this->pondokkode->status_aktif($aktif=0);
    $nip = $this->encryption->decode($nip);
    $query = $this->db->query("SELECT nama FROM tbl_guru WHERE nip='$nip'")->row();
    $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Hapus Data Sukses\',\'Hapus data guru dengan nama guru: <strong>'.$query->nama.'</strong> berhasil.\');');
    $id['nip'] = $nip;
    $this->db->delete("tbl_guru",$id);
    redirect("admin/akademik/guru");
  }

  function cek_nip()
  {
        $nip = $_POST["nip"];
        $query = $this->db->query("SELECT * FROM tbl_guru WHERE nip='$nip'");
        if(($query->num_rows())>0)
        {
           echo "false";
        }else{
           echo "true";
        }
  }

}
