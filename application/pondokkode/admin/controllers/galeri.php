<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class galeri extends MX_Controller {

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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Galeri";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Galeri ', '#','');
    // filter record berita
    $filter['data_album'] = $this->session->userdata("data_album");
    //generate data berita
    $data['data_album'] = $this->pondokkode_model_admin->generate_album($this->config->item("limit_10"),$uri,$filter);
    //loadpagination
    $data['paging'] = $this->pagination->create_links();
    // Set search by nama / username/ id user
    $sess['data_album'] = $this->input->post("data_album");
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
    $data['galeri']      = "active";
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
                      $this->load->view('galeri/data_album');
                      $this->load->view('footer');
  }

  public function search()
	{
		    // mencegah user yang belum login untuk mengakses halaman ini
			$this->pondokkode->restrict();
		    // Set search by nama sistem
			$sess['data_album'] = mysql_escape_string($this->input->post("data_album"));
			$this->session->set_userdata($sess);
			redirect("admin/galeri");
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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Galeri";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Galeri ', base_url().'admin/galeri','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Tambah ', '#','');
    $data['tipe'] = "tambah";
    $data['id_album'] = "";
    $data['nama_album'] = "";
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
    $data['file']        = "";
    $data['galeri']      = "active";
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
                      $this->load->view('galeri/form_album');
                      $this->load->view('footer');
  }

  public function edit($id_album)
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
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Galeri";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Galeri ', base_url().'admin/galeri','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Edit ', '#','');
    //get detail album
    $get_data = $this->pondokkode_model_admin->get_detail_album($this->encryption->decode($id_album));
    $get = $get_data->row();
    $data['tipe'] = "edit";
    $data['id_album'] = $get->id_album;
    $data['nama_album'] = $get->nama_album;
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
    $data['konten']      = "";
    $data['pages']       = "";
    $data['menu']        = "";
    $data['file']        = "";
    $data['galeri']      = "active";
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
                      $this->load->view('galeri/form_album');
                      $this->load->view('footer');
  }

  public function simpan()
  {
    // mencegah user yang belum login untuk mengakses halaman ini
    $this->pondokkode->restrict();
    //cek apakah user aktif ?
    $this->pondokkode->status_aktif($aktif=0);
    $tipe           = $this->input->post("tipe");
    $id['id_album'] = $this->input->post("id");
    $nama_album     = $this->input->post("nama_album");
    if($tipe=="tambah")
    {
      $insert['nama_album']       = $nama_album;
      $insert['last_data_update'] = date("Y-m-d H:i:s");
      $insert['id_user_update']   = $this->session->userdata("user_id");
      $this->db->insert("tbl_album",$insert);
      // Pesan berhasil simpan
      $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Simpan Data Sukses\',\'Penambahan data album foto <strong>'.$nama_album.'</strong> berhasil disimpan.\');');
      redirect('admin/galeri');
    }else if($tipe=="edit")
    {
      $update['nama_album']       = $nama_album;
      $update['last_data_update'] = date("Y-m-d H:i:s");
      $update['id_user_update']   = $this->session->userdata("user_id");
      $this->db->update("tbl_album",$update,$id);
      // Pesan berhasil simpan
      $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update Data Sukses\',\'Perubahan data album foto <strong>'.$nama_album.'</strong> berhasil disimpan.\');');
      redirect('admin/galeri');
    }
  }

  function delete_dir($src) {
          $dir = opendir($src);
          while(false !== ( $file = readdir($dir)) ) {
              if (( $file != '.' ) && ( $file != '..' )) {
                  if ( is_dir($src . '/' . $file) ) {
                      delete_dir($src . '/' . $file);
                  }
                  else {
                      unlink($src . '/' . $file);
                  }
              }
          }
          rmdir($src);
          closedir($dir);
      }

      public function delete($id_album)
      {
        // mencegah user yang belum login untuk mengakses halaman ini
        $this->pondokkode->restrict();
        // cek apakah status user aktif atau tidak, jika tidak akan ke redirect halaman login
        $this->pondokkode->status_aktif($aktif=0);
        $id_album = $this->encryption->decode($id_album);
        $query = $this->db->query("SELECT nama_album FROM tbl_album WHERE id_album='$id_album'")->row();
        // Delete FOlder
        $path = "./assets/foto_galeri/";
        $folder = url_title(strtolower($query->nama_album));
        if(is_dir($path.$folder)){
          $this->delete_dir($path.$folder);
        }
        // pesan berhasil delete
        $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Hapus Data Sukses\',\'Hapus data album foto <strong>'.$query->nama_album.'</strong> berhasil.\');');
        $id['id_album'] = $id_album;
        $this->db->delete("tbl_album",$id);
        redirect("admin/galeri");
      }

      public function add_picture($id_album,$uri=0)
      {
       // Import JS
       $data['data_js'] = '<script type="text/javascript" src="'.base_url().'assets/admin/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>'
                              . '<script type="text/javascript" src="'.base_url().'assets/admin/plugins/fancybox/source/jquery.fancybox.pack.js"></script>'
                              . '<script type="text/javascript" src="'.base_url().'assets/admin/plugins/jquery-mixitup/jquery.mixitup.min.js"></script>'
                              . '<script src="'.base_url().'assets/admin/scripts/portfolio.js"></script>';
      // Import JS Readey
      $data['js_ready'] = "Portfolio.init();";
      // mencegah user yang belum login untuk mengakses halaman ini
      $this->pondokkode->restrict();
      // cek apakah status user aktif atau tidak, jika tidak akan ke redirect halaman login
      $this->pondokkode->status_aktif($aktif=0);
      // load model 'admin_model'
      $this->load->model('pondokkode_model_admin');
      //Page title
      $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Galeri" ;
      // load library breadcrumb
      $id_album_foto = $this->encryption->decode($id_album);
      $query = $this->db->query("SELECT nama_album FROM tbl_album WHERE id_album='$id_album_foto'")->row();
      $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin/dashboard','fa fa-angle-right');
      $this->breadcrumb->append_crumb('','Galeri ', base_url().'admin/galeri','fa fa-angle-right');
      $this->breadcrumb->append_crumb('','Tambah Gambar '.$query->nama_album.'', '#','');
      // Isi value pada
      $data['id_album'] = $id_album_foto;
      // Create Folder
      $path = "./assets/foto_galeri/";
      $folder = url_title(strtolower($query->nama_album));
      $dir_exist = true;
      if(!is_dir($path.$folder)) //create the folder if it's not already exists
      {
        mkdir($path.$folder,0777,TRUE);
        $dir_exist = false;
      }
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
      $data['galeri']      = "active";
      $data['testimoni']   = "";
      $data['master']      = "";
      $data['user']        = "";
      $data['log_session'] = "";
      $data['setting']     = "";
      $data['umum']        = "";
      $data['banner']      = "";
      // generate user
      $data['data_foto_galeri'] = $this->pondokkode_model_admin->generate_foto_galeri($this->config->item("limit_10"),$uri,$id_album_foto,$id_album);
      //loadpagination
      $data['paging'] = $this->pagination->create_links();
      // tampilkan halaman form user
      $this->load->view('header',$data);
                      $this->load->view('sidebar');
                      $this->load->view('breadcrumb');
                      $this->load->view('galeri/form_foto_galeri');
                      $this->load->view('footer');

      }

      function upload()
      {
        // mencegah user yang belum login untuk mengakses halaman ini
        $this->pondokkode->restrict();
        // cek apakah status user aktif atau tidak, jika tidak akan ke redirect halaman login
        $this->pondokkode->status_aktif($aktif=0);
        // Ambil value post data
        $id_album = $this->input->post("id_album");
        $query = $this->db->query("SELECT nama_album FROM tbl_album WHERE id_album='$id_album'")->row();
        $folder = url_title(strtolower($query->nama_album));
        $upload_conf = array(
                      'upload_path'   => realpath('assets/foto_galeri/'.$folder),
                      'allowed_types' => 'gif|jpg|png|jpeg',
                      'max_size'      => '50000',
                      'encrypt_name'  => TRUE
                      );

                  $this->upload->initialize( $upload_conf );

                  // Change $_FILES to new vars and loop them
                  foreach($_FILES['files'] as $key=>$val)
                  {
                      $i = 1;
                      foreach($val as $v)
                      {
                          $field_name = "file_".$i;
                          $_FILES[$field_name][$key] = $v;
                          $i++;
                      }
                  }
                  // Unset the useless one ;)
                  unset($_FILES['files']);

                  // Put each errors and upload data to an array
                  $error = array();
                  $success = array();

                  // main action to upload each file
                  foreach($_FILES as $field_name => $file)
                  {
                      if ( ! $this->upload->do_upload($field_name))
                      {
                          // if upload fail, grab error
                          $error['upload'][] = $this->upload->display_errors();
                      }
                      else
                      {

                          // otherwise, put the upload datas here.
                          // if you want to use database, put insert query in this loop
                          $upload_data = $this->upload->data();
                          // set the resize config
                          $resize_conf = array(
                              // it's something like "/full/path/to/the/image.jpg" maybe
                              'image_library' => 'gd2',
                              'source_image'  => $upload_data['full_path'],
                              // and it's "/full/path/to/the/" + "thumb_" + "image.jpg
                              // or you can use 'create_thumbs' => true option instead
                              'new_image'     => $upload_data['file_path'].'images_'.$upload_data['file_name'],
                              'wm_overlay_path' => realpath('assets/admin/img/watermark.png'),
                              'wm_vrt_alignment' => 'bottom',
                              'wm_hor_alignment' => 'right',
                              'wm_opacity' => 1,
                              'wm_type' => 'overlay',
                              );
                          // initializing
                          $this->image_lib->initialize($resize_conf);
                          $pic = 'images_'.$upload_data['file_name'];
                          $query = $this->db->query("SELECT foto_galeri FROM tbl_foto_galeri WHERE foto_galeri='$pic' AND album_id='$id_album'");
                          if(!$query->num_rows()>0){
                          $insert['album_id'] = $id_album;
                          $insert['foto_galeri'] = $pic;
                          $insert['last_data_update'] = date("Y-m-d H:i:s");
                          $insert['id_user_update'] = $this->session->userdata('user_id');
                          $this->db->insert("tbl_foto_galeri",$insert);
                          }
                          // do it!
                          if (!$this->image_lib->resize())
                          {
                              // if got fail.
                              $error['resize'][] = $this->image_lib->display_errors();
                          }
                          else
                          {
                              // otherwise, put each upload data to an array.
                              $this->image_lib->watermark();
                              $this->image_lib->clear();
                              $success[] = $upload_data;
                              $sukses .= $pic.'<br/>';
                          }
                          unlink(realpath('assets/foto_galeri/'.$folder.'/'.$upload_data['file_name']));
                      }
                  }

                  // see what we get
                  if(count($error) > 0)
                  {
                      $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'error\',\'Upload Gambar Gagal\',\'Proses upload gambar gagal.\');');
                  }
                  else
                  {
                      $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Upload Gambar Berhasil\',\'Upload Gambar:<br/> '.$sukses.' Berhasil\');');
                  }

                  redirect('admin/galeri/add_picture/'.$this->encryption->encode($id_album).'');

      }

      public function update()
      {
        // mencegah user yang belum login untuk mengakses halaman ini
        $this->pondokkode->restrict();
        // cek apakah status user aktif atau tidak, jika tidak akan ke redirect halaman login
        $this->pondokkode->status_aktif($aktif=0);
        // Ge tpost
        $id_album= $this->input->post("id_album");
        $id_foto = $this->input->post("id_foto_galeri");
        $caption = $this->input->post("caption_foto");
        $lokasi = $this->input->post("lokasi_foto");
        $jml = count($id_foto);
          for($i=0;$i<$jml;$i++)
            {
              $id['id_foto_galeri'] = $id_foto[$i];
              $update['caption_foto'] = $caption[$i];
              $update['lokasi_foto'] = $lokasi[$i];
              $update['last_data_update'] = date("Y-m-d H:i:s");
              $update['id_user_update'] = $this->session->userdata('user_id');
              $this->db->update("tbl_foto_galeri",$update,$id);
            }
        $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Update Data Berhasil\',\'Perubahan Data Gambar Berhasil\');');
        redirect('admin/galeri/add_picture/'.$this->encryption->encode($id_album).'');

      }

      public function delete_picture($id_foto_galeri, $id_album)
      {
        // mencegah user yang belum login untuk mengakses halaman ini
        $this->pondokkode->restrict();
        // cek apakah status user aktif atau tidak, jika tidak akan ke redirect halaman login
        $this->pondokkode->status_aktif($aktif=0);
        $id_foto_galeri = $this->encryption->decode($id_foto_galeri);
        //$id_album = $this->encryption->decode($id_album);
        $query  = $this->db->query("SELECT caption_foto, lokasi_foto, foto_galeri FROM tbl_foto_galeri WHERE id_foto_galeri='$id_foto_galeri'")->row();
        unlink(realpath('assets/foto_galeri/'.$query->foto_galeri));
        $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Hapus Data Sukses\',\'Hapus data foto galeri<strong>'.$query->caption_foto.'-'.$query->lokasi_foto.'</strong> berhasil.\');');
        $id['id_foto_galeri'] = $id_foto_galeri;
        $this->db->delete("tbl_foto_galeri",$id);
        redirect('admin/galeri/add_picture/'.$this->encryption->encode($id_album).'');

        }

}
