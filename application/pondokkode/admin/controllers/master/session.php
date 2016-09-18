<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class session extends MX_Controller {

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
    $data['data_js'] = "";
    // Import JS Readey
    $data['js_ready'] = "";
    //page title
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Log Session";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Master ', '#','fa fa-angle-right');
    $this->breadcrumb->append_crumb('','Log Session ', '#','');
    // generate user
    $data['data_session'] = $this->pondokkode_model_admin->generate_session();
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
    $data['user']        = "";
    $data['log_session'] = "active";
    $data['setting']     = "";
    $data['umum']        = "";
    $data['banner']      = "";
    //tampilkan view dengan data
    $this->load->view('header',$data);
                      $this->load->view('sidebar');
                      $this->load->view('breadcrumb');
                      $this->load->view('master/session');
                      $this->load->view('footer');
  }
}
