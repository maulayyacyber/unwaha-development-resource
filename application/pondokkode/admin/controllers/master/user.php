<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class user extends MX_Controller {

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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> User";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Master ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','User ', '#','');
    // session id user
    $id_user = $this->session->userdata('user_id');
    // filter record user
    $filter['data_user'] = $this->session->userdata("data_user");
    // generate user
    $data['data_user'] = $this->pondokkode_model_admin->generate_user($this->config->item("limit_10"),$uri,$filter,$id_user);
    //loadpagination
    $data['paging'] = $this->pagination->create_links();
    // Set search by nama / username/ id user
    $sess['data_user'] = $this->input->post("data_user");
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
    $data['file']        = "";
    $data['galeri']      = "";
    $data['testimoni']   = "";
    $data['master']      = "active";
    $data['user']        = "active";
    $data['log_session'] = "";
    $data['setting']     = "";
    $data['umum']        = "";
    $data['banner']      = "";
    //tampilkan view dengan data
    $this->load->view('header',$data);
                      $this->load->view('sidebar');
                      $this->load->view('breadcrumb');
                      $this->load->view('master/data_user');
                      $this->load->view('footer');
  }

  public function search()
	{
		    // mencegah user yang belum login untuk mengakses halaman ini
			$this->pondokkode->restrict();
		    // Set search by nama sistem
			$sess['data_user'] = mysql_escape_string($this->input->post("data_user"));
			$this->session->set_userdata($sess);
			redirect("admin/master/user");
	}

  public function activated($id_user,$value)
	{
		//mencegah user yang belum login mengakses halaman ini
		$this->pondokkode->restrict();
		//cek apakah user aktif ?
    $id_user = $this->encryption->decode($id_user);
		$this->pondokkode->status_aktif($aktif=0);
		$id['id_user'] = $id_user;
		$update['aktif_user'] = $value;
		$this->db->update("tbl_user",$update,$id);
		$query = $this->db->query("SELECT nama_user FROM tbl_user WHERE id_user='$id_user'")->row();
		if($value==0)
		{
			$this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Penonaktifan Data Sukses\',\'Penonaktifan data user dengan nama user: <strong>'.$query->nama_user.'</strong> berhasil.\');');
		}else{
			$this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Pengaktifan Data Sukses\',\'Pengaktifan data user dengan nama user: <strong>'.$query->nama_user.'</strong> berhasil.\');');
		}
		redirect('admin/master/user');
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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> User";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Master ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','User ',  base_url().'admin/master/user','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Tambah ', '#','');
    // deklarasi variabel form user
    $data['tipe'] = "tambah";
    $data['id'] = "";
    $data['nama_user'] = "";
    $data['email_user'] = "";
    $data['user_name'] = "";
    $data['nama_form'] = "form_user";
    $data['help_pass'] = "<span class='help-block'></span>";
    $data['foto_user'] = "foto_user";
    $data['frame_foto_user'] = "".base_url()."assets/admin/foto_user/no_image_guru.png";
    $data['foto_user_value'] = "foto_user";
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
    $data['master']      = "active";
    $data['user']        = "active";
    $data['log_session'] = "";
    $data['setting']     = "";
    $data['umum']        = "";
    $data['banner']      = "";
    //tampilkan view dengan data
    $this->load->view('header',$data);
                      $this->load->view('sidebar');
                      $this->load->view('breadcrumb');
                      $this->load->view('master/form_user');
                      $this->load->view('footer');
  }

  public function edit($id_user)
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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> User";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Master ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','User ',  base_url().'admin/master/user','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Edit ', '#','');
    //get detail user
    $get_data_user = $this->pondokkode_model_admin->get_detail_user($this->encryption->decode($id_user));
    $get_user = $get_data_user->row();
    // deklarasi variabel form user
    $data['tipe'] = "edit";
    $data['id'] = $this->encryption->decode($id_user);
    $data['nama_user'] = $get_user->nama_user;
    $data['email_user'] = $get_user->email_user;
    $data['user_name'] = $get_user->user_name;
    $data['nama_form'] = "form_user_edit";
    $data['help_pass'] = "<span class='help-block'></span>";
    $data['foto_user'] = "foto_user_edit";
    if($get_user->foto_user=="")
    {
      $data['frame_foto_user'] = "".base_url()."assets/admin/foto_user/no_image_guru.png";
    }else{
      $data['frame_foto_user'] = "".base_url()."assets/admin/foto_user/200/".$get_user->foto_user."";
    }
    $data['foto_user_value'] = $get_user->foto_user;
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
    $data['master']      = "active";
    $data['user']        = "active";
    $data['log_session'] = "";
    $data['setting']     = "";
    $data['umum']        = "";
    $data['banner']      = "";
    //tampilkan view dengan data
    $this->load->view('header',$data);
                      $this->load->view('sidebar');
                      $this->load->view('breadcrumb');
                      $this->load->view('master/form_user');
                      $this->load->view('footer');
  }

  public function simpan()
  {
    $this->pondokkode->restrict();
    $this->pondokkode->status_aktif($aktif=0);
    print $this->session->userdata('user_id');
    //tangkap dari post
    $tipe = $this->input->post("tipe");
    $id['id_user'] = $this->input->post("id");
    $foto_user = $this->input->post("foto_user_value");
    $nama_user    = $this->input->post("nama_user");
    $email_user = $this->input->post("email_user");
    $user_name   = $this->input->post("user_name");
    $pass_user   = $this->input->post("re_pass_user");
    if($tipe=="tambah")
    {
        // mencegah user mengakses menu yang tidak boleh dia buka
        //$this->auth->cek_menu(5);
        if(empty($_FILES['foto_user']['name']))
        {
            // Simpan ke tabel user
            $insert['nama_user'] = $nama_user;
            $insert['email_user'] = $email_user;
            $insert['user_name'] = $user_name;
            $insert['pass_user'] = md5($pass_user);
            //$insert['level_user'] = $level_user;
            $insert['aktif_user'] = "1";
            $insert['last_data_update'] = date("Y-m-d H:i:s");
            $insert['id_user_update'] = $this->session->userdata('user_id');
            $this->db->insert("tbl_user",$insert);
            // Pesan berhasil simpan
            $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Simpan Data Sukses\',\'Penambahan data user <strong>'.$nama_user.'</strong> dengan username: <strong>'.$user_name.'</strong> berhasil disimpan.\');');
            redirect('admin/master/user');
        }else{
            $config['upload_path'] = './assets/admin/foto_user/';
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

            if ($this->upload->do_upload("foto_user")) {
                $data_upload	 	= $this->upload->data();

                /* PATH */
                $source             = "./assets/admin/foto_user/".$data_upload['file_name'] ;
                $destination_thumb	= "./assets/admin/foto_user/200/" ;

                // Permission Configuration
                chmod($source, 0777) ;

                /* Resizing Processing */
                // Configuration Of Image Manipulation :: Static
                $img['image_library'] = 'GD2';
                $img['create_thumb']  = TRUE;
                $img['maintain_ratio']= TRUE;

                /// Limit Width Resize
                $limit_thumb    = 200 ;

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
                $insert['foto_user'] = $data_upload['file_name'];
                $insert['nama_user'] = $nama_user;
                $insert['email_user'] = $email_user;
                $insert['user_name'] = $user_name;
                $insert['pass_user'] = md5($pass_user);
                //$insert['level_user'] = $level_user;
                $insert['aktif_user'] = "1";
                $insert['last_data_update'] = date("Y-m-d H:i:s");
                $insert['id_user_update'] = $this->session->userdata('user_id');
                $this->db->insert("tbl_user",$insert);
                unlink($source);

                // Pesan berhasil simpan
                $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Simpan Data Sukses\',\'Penambahan data user <strong>'.$nama_user.'</strong> dengan username: <strong>'.$user_name.'</strong> berhasil disimpan.\');');
                redirect('admin/master/user');
            }else{
                $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'error\',\'Simpan Data Gagal\',\''.$this->upload->display_errors('<p>','</p>').'\');');
                redirect('admin/master/user');
            }
        }
    }elseif($tipe=="edit"){
    // mencegah user mengakses menu yang tidak boleh dia buka
    //$this->auth->cek_menu(6);
    if($pass_user=="")
    {
      if(empty($_FILES['foto_user_edit']['name']))
      {
        // Simpan ke tabel user
        $update['nama_user'] = $nama_user;
        $update['email_user'] = $email_user;
        $update['user_name'] = $user_name;
        //$insert['pass_user'] = md5($pass_user);
        //$update['level_user'] = $level_user;
        $update['last_data_update'] = date("Y-m-d H:i:s");
        $update['id_user_update'] = $this->session->userdata('user_id');
        $this->db->update("tbl_user",$update,$id);
        // Pesan berhasil simpan
        $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update Data Sukses\',\'Perubahan data user <strong>'.$nama_user.'</strong> dengan username: <strong>'.$user_name.'</strong> berhasil disimpan.\');');
        redirect('admin/master/user');
      }else{
        $config['upload_path'] = './assets/admin/foto_user/';
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

        if ($this->upload->do_upload("foto_user_edit")) {
            $data_upload	 	= $this->upload->data();
        /* PATH */
        $source             = "./assets/admin/foto_user/".$data_upload['file_name'] ;
        $destination_thumb	= "./assets/admin/foto_user/200/" ;
        $source_old             = "./assets/admin/foto_user/200/".$foto_user."" ;
        // Permission Configuration
        chmod($source, 0777) ;
        /* Resizing Processing */
        // Configuration Of Image Manipulation :: Static
        $img['image_library'] = 'GD2';
        $img['create_thumb']  = TRUE;
        $img['maintain_ratio']= TRUE;
        /// Limit Width Resize
        $limit_thumb    = 200 ;
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
        $update['foto_user'] = $data_upload['file_name'];
        $update['nama_user'] = $nama_user;
        $update['email_user'] = $email_user;
        $update['user_name'] = $user_name;
        //$update['pass_user'] = md5($pass_user);
        //$update['level_user'] = $level_user;
        $update['aktif_user'] = "1";
        $update['last_data_update'] = date("Y-m-d H:i:s");
        $update['id_user_update'] = $this->session->userdata('user_id');
        $this->db->update("tbl_user",$update,$id);
        unlink($source);
        unlink($source_old);
        // Pesan berhasil simpan
        $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update Data Sukses\',\'Perubahan data user <strong>'.$nama_user.'</strong> dengan username: <strong>'.$user_name.'</strong> berhasil disimpan.\');');
        redirect('admin/master/user');
        }else{
        $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'error\',\'Update Data Gagal\',\''.$this->upload->display_errors('<p>','</p>').'\');');
        redirect('admin/master/user');
        }
        }
        }else{
        if(empty($_FILES['foto_user_edit']['name']))
        {
        // Simpan ke tabel user
        $update['nama_user'] = $nama_user;
        $update['email_user'] = $email_user;
        $update['user_name'] = $user_name;
        $update['pass_user'] = md5($pass_user);
        //$update['level_user'] = $level_user;
        $update['last_data_update'] = date("Y-m-d H:i:s");
        $update['id_user_update'] = $this->session->userdata('user_id');
        $this->db->update("tbl_user",$update,$id);
        // Pesan berhasil simpan
        $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update Data Sukses\',\'Perubahan data user <strong>'.$nama_user.'</strong> dengan username: <strong>'.$user_name.'</strong> berhasil disimpan.\');');
        redirect('admin/master/user');
        }else{
        $config['upload_path'] = './assets/admin/foto_user/';
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
        
        if ($this->upload->do_upload("foto_user_edit")) {
            $data_upload	 	= $this->upload->data();

        /* PATH */
        $source             = "./assets/admin/foto_user/".$data_upload['file_name'] ;
        $destination_thumb	= "./assets/admin/foto_user/200/" ;
        $source_old             = "./assets/admin/foto_user/200/".$foto_user."" ;
        // Permission Configuration
        chmod($source, 0777) ;

        /* Resizing Processing */
        // Configuration Of Image Manipulation :: Static
        $img['image_library'] = 'GD2';
        $img['create_thumb']  = TRUE;
        $img['maintain_ratio']= TRUE;

        /// Limit Width Resize
        $limit_thumb    = 200 ;

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
        $update['foto_user'] = $data_upload['file_name'];
        $update['nama_user'] = $nama_user;
        $update['email_user'] = $email_user;
        $update['user_name'] = $user_name;
        $update['pass_user'] = md5($pass_user);
        //$update['level_user'] = $level_user;
        $update['aktif_user'] = "1";
        $update['last_data_update'] = date("Y-m-d H:i:s");
        $update['id_user_update'] = $this->session->userdata('user_id');
        $this->db->update("tbl_user",$update,$id);
        unlink($source);
        unlink($source_old);
        // Pesan berhasil simpan
        $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update Data Sukses\',\'Perubahan data user <strong>'.$nama_user.'</strong> dengan username: <strong>'.$user_name.'</strong> berhasil disimpan.\');');
        redirect('admin/master/user');
        }else{
        $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'error\',\'Update Data Gagal\',\''.$this->upload->display_errors('<p>','</p>').'\');');
        redirect('admin/master/user');
        }
        }
      }
    }
  }

  public function delete($user_id)
  {

    // mencegah user yang belum login untuk mengakses halaman ini
    $this->pondokkode->restrict();
    // cek apakah status user aktif atau tidak, jika tidak akan ke redirect halaman login
    $this->pondokkode->status_aktif($aktif=0);
    $id_user = $this->encryption->decode($user_id);
    $query = $this->db->query("SELECT nama_user FROM tbl_user WHERE id_user='$id_user'")->row();
    $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Hapus Data Sukses\',\'Hapus data user dengan nama user: <strong>'.$query->nama_user.'</strong> berhasil.\');');
    $id['id_user'] = $id_user;
    $this->db->delete("tbl_user",$id);
    redirect("admin/master/user");
  }

  function cek_email()
  {
      $id = $_POST["id"];
      $email = $_POST["email"];
      $query = $this->db->query("SELECT id_user FROM tbl_user WHERE email_user='$email' AND id_user!='$id'");
      if(($query->num_rows())>0)
      {
         echo "false";
      }else{
         echo "true";
      }
  }

  function cek_username()
  {
      $id = $_POST["id"];
      $username = $_POST["username"];
      $query = $this->db->query("SELECT id_user FROM tbl_user WHERE user_name='$username' AND id_user!='$id'");
      if(($query->num_rows())>0)
      {
         echo "false";
      }else{
         echo "true";
      }
  }

}
