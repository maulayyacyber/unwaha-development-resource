<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class banner extends MX_Controller {

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
    //get banner
    $data['data_banner'] = $this->pondokkode_model_admin->generate_banner();
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
    $data['umum']        = "";
    $data['banner']      = "active";
    //tampilkan view dengan data
    $this->load->view('header',$data);
                      $this->load->view('sidebar');
                      $this->load->view('breadcrumb');
                      $this->load->view('setting/form_banner');
                      $this->load->view('footer');
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
                  'upload_path'   => realpath('assets/foto_banner/'),
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
                          'new_image'     => $upload_data['file_path'].'banner_'.$upload_data['file_name']
                          );
                      // initializing
                      $this->image_lib->initialize($resize_conf);
                      $pic = 'banner_'.$upload_data['file_name'];
                      $query = $this->db->query("SELECT foto_banner FROM tbl_banner WHERE foto_banner='$pic'");
                      if(!$query->num_rows()>0){
                      $insert['foto_banner'] = $pic;
                      $insert['last_data_update'] = date("Y-m-d H:i:s");
                      $insert['id_user_update'] = $this->session->userdata('user_id');
                      $this->db->insert("tbl_banner",$insert);
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
                      unlink(realpath('assets/foto_banner/'.$upload_data['file_name']));
                  }
              }

              // see what we get
              if(count($error) > 0)
              {
                  $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'error\',\'Upload Banner Gagal\',\'Proses upload banner gagal.\');');
              }
              else
              {
                  $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Upload Banner Berhasil\',\'Upload Banner:<br/> '.$sukses.' Berhasil\');');
              }

              redirect('admin/setting/banner');
  }

  public function delete($id_banner)
    {
      // mencegah user yang belum login untuk mengakses halaman ini
      $this->pondokkode->restrict();
      // load model 'admin_model'
      $this->load->model('pondokkode_model_admin');
      //cek apakah user aktif ?
      $this->pondokkode->status_aktif($aktif=0);
      $id_ban = $this->encryption->decode($id_banner);
      $query = $this->db->query("SELECT foto_banner FROM tbl_banner WHERE id_banner='$id_ban'")->row();
      unlink(realpath('assets/foto_banner/'.$query->foto_banner));
      $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Hapus Banner Sukses\',\'Hapus banner <strong>'.$query->foto_banner.'</strong> berhasil.\');');
      $id['id_banner'] = $id_ban;
      $this->db->delete("tbl_banner",$id);
      redirect("admin/setting/banner");

    }

}
