<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class umum extends MX_Controller {

function _construct(){
parent::__construct();
if(!$this->session->sess_read()){
    $data['login_info'] = '';
    $this->load->view('login',$data);
}
}

	public function index()
	{
    // mencegah user yang belum login untuk mengakses halaman ini
    $this->pondokkode->restrict();
    // load model 'admin_model'
    $this->load->model('pondokkode_model_admin');
    //cek apakah user aktif ?
    $this->pondokkode->status_aktif($aktif=0);
    // Import JS
    $data['data_js'] = '<script type="text/javascript" src="'.base_url().'assets/admin/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>'
                           . '<script type="text/javascript" src="'.base_url().'assets/admin/plugins/fancybox/source/jquery.fancybox.pack.js"></script>'
                           . '<script type="text/javascript" src="'.base_url().'assets/admin/plugins/jquery-mixitup/jquery.mixitup.min.js"></script>'
                           . '<script src="'.base_url().'assets/admin/scripts/portfolio.js"></script>';
    // Import JS Readey
    $data['js_ready'] = "Portfolio.init();";
    //page title
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Umum";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Setting ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Umum ', '#','');
    //get setting Umum
    $data['data_umum'] = $this->pondokkode_model_admin->generate_setting_umum();
    //get setting email
    $data['data_email'] = $this->pondokkode_model_admin->generate_setting_email();
    //get setting logo
    $data['data_logo'] = $this->pondokkode_model_admin->generate_logo();
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
    $data['master']      = "";
    $data['user']        = "";
    $data['log_session'] = "";
    $data['setting']     = "active";
    $data['umum']        = "active";
    $data['banner']      = "";
    //tampilkan view dengan data
    $this->load->view('header',$data);
                      $this->load->view('sidebar');
                      $this->load->view('breadcrumb');
                      $this->load->view('setting/data_umum');
                      $this->load->view('footer');
  }

  function simpan()
  {
    // mencegah user yang belum login untuk mengakses halaman ini
    $this->pondokkode->restrict();
    // load model 'admin_model'
    $this->load->model('pondokkode_model_admin');
    //cek apakah user aktif ?
    $this->pondokkode->status_aktif($aktif=0);
    // Ge tpost
    $id_setting = $this->input->post("id_setting");
    $nilai = $this->input->post("nilai_setting");
    $jml = count($id_setting);
    for($i=0;$i<$jml;$i++)
    {
      $id['id_setting'] = $id_setting[$i];
      $update['content_setting'] = $nilai[$i];
      $update['id_user'] = $this->session->userdata('user_id');
      $this->db->update("tbl_setting",$update,$id);
    }
    $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Simpan Data Berhasil\',\'Pengaturan umum berhasil disimpan.\');');
    redirect('admin/setting/umum');
  }

  function simpan_email()
  {
    // mencegah user yang belum login untuk mengakses halaman ini
    $this->pondokkode->restrict();
    // load model 'admin_model'
    $this->load->model('pondokkode_model_admin');
    //cek apakah user aktif ?
    $this->pondokkode->status_aktif($aktif=0);
    // Ge tpost
    $id_param = $this->input->post("id_parameter");
    $nilai = $this->input->post("nilai_parameter");
    $jml = count($id_param);
    for($i=0;$i<$jml;$i++)
    {
        $id['id_parameter'] = $id_param[$i];
        $update['nilai_parameter'] = $nilai[$i];
        $update['last_data_update'] = date("Y-m-d H:i:s");
        $update['id_user_update'] = $this->session->userdata('user_id');
        $this->db->update("tbl_setting_email",$update,$id);
    }
    $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Simpan Data Berhasil\',\'Pengaturan email berhasil disimpan.\');');
    redirect('admin/setting/umum');
  }

  function upload()
  {
    // mencegah user yang belum login untuk mengakses halaman ini
    $this->pondokkode->restrict();
    // load model 'admin_model'
    $this->load->model('pondokkode_model_admin');
    //cek apakah user aktif ?
    $this->pondokkode->status_aktif($aktif=0);

              $upload_conf = array(
                  'upload_path'   => realpath('assets/images/'),
                  'allowed_types' => 'jpg|png|jpeg',
                  'encrypt_name'  => true,
                  'max_size'      => '50000'
                  );

              $this->upload->initialize( $upload_conf );

              // Change $_FILES to new vars and loop them
              foreach($_FILES['banners'] as $key=>$val)
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
              unset($_FILES['banners']);

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
                          'new_image'     => $upload_data['file_path'].'logo_'.$upload_data['file_name']
                          );
                      // initializing
                      $this->image_lib->initialize($resize_conf);
                      $pic = 'logo_'.$upload_data['file_name'];
                      $id['id_setting']  = $this->input->post("id_setting");
                      $update['content_setting'] = $pic;
                      $update['id_user'] = $this->session->userdata('user_id');
                      $this->db->update("tbl_setting",$update,$id);

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
                      unlink(realpath('assets/images/'.$upload_data['file_name']));
                  }
              }

              // see what we get
              if(count($error) > 0)
              {
                  $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'error\',\'Upload Logo Gagal\',\'Proses upload logo gagal.\');');
              }
              else
              {
                  $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Upload Logo Berhasil\',\'Upload logo:<br/> '.$sukses.' Berhasil\');');
              }

              redirect('admin/setting/umum');
  }

}
