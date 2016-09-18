<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class dashboard extends MX_Controller {

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
    $data['data_js'] = '<script src="'.base_url().'assets/admin/highcharts/highcharts.js" type="text/javascript"></script>'
                                . '<script src="'.base_url().'assets/admin/highcharts/exporting.js" type="text/javascript"></script>';
    // Import JS Readey
    $data['js_ready'] = "GetToday('".date("Y-m-d")."')";
    //page title
    $data['page_title'] = "<i class='glyphicon glyphicon-hand-right'></i> Dashboard";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('fa fa-home','Dashboard ', base_url().'admin','');
    // Get Count Visitor
    $today_visit = $this->pondokkode_model_admin->count_in_today();
    $get_today_visit = $today_visit->row();
    $data['today_visit'] = $get_today_visit->count_in_today;

    $week_visit = $this->pondokkode_model_admin->count_in_week();
    $get_week_visit = $week_visit->row();
    $data['week_visit'] = $get_week_visit->count_in_week;

    $month_visit = $this->pondokkode_model_admin->count_in_month();
    $get_month_visit = $month_visit->row();
    $data['month_visit'] = $get_month_visit->count_in_month;

    $year_visit = $this->pondokkode_model_admin->count_in_year();
    $get_year_visit = $year_visit->row();
    $data['year_visit'] = $get_year_visit->count_in_year;
    //active menu sidebar
    $data['dashboard']   = "active";
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
    $data['setting']     = "";
    $data['umum']        = "";
    $data['banner']      = "";
    //tampilkan view dengan data
    $this->load->view('header',$data);
                      $this->load->view('sidebar');
                      $this->load->view('breadcrumb');
                      $this->load->view('dashboard/dashboard');
                      $this->load->view('footer');
  }

  function get_chart_data() {
      //if (isset($_POST['start']) AND isset($_POST['end'])) {
      //$start_date = $_POST['start'];
      //$end_date = $_POST['end'];
      $results = $this->pondokkode_model_admin->get_chart_data_for_visits(/*$start_date, $end_date*/);
      if ($results === NULL) {
      print_r('No record found');
      } else {
      print_r($results);
      }
      //} else {
      //echo json_encode('Date must be selected.');
     // }
  }

  function get_chart_today()
  {
      $tgl = $this->input->post("tgl");
      $jm = array();
      $total = array();
      for($jam=00;$jam<=23;$jam++){
          if(strlen($jam)==1)
          {
            $query = $this->db->query("SELECT count(id_counter) as total_pengunjung FROM tbl_counter WHERE DATE(date_visit)='$tgl' AND DATE_FORMAT(date_visit, '%H')='0$jam'");
            $get = $query->row();
            $jm[] = "0$jam";
            $total[] = $get->total_pengunjung;
          }else{
            $query = $this->db->query("SELECT count(id_counter) as total_pengunjung FROM tbl_counter WHERE DATE(date_visit)='$tgl' AND DATE_FORMAT(date_visit, '%H')='$jam'");
            $get = $query->row();
            $jm[] = "$jam";
            $total[] = $get->total_pengunjung;
          }
      }
      echo json_encode(array("jam" => $jm, "total" => $total), JSON_NUMERIC_CHECK);
  }

  function get_chart_week()
  {
      $tgl2 = strtotime($this->input->post("tgl1"));
      $tgl1 = strtotime($this->input->post("tgl2"));
      $tgl = array();
      $total = array();
      $m= date("m");
      $de= date("d");
      $y= date("Y");
      for($i=0; $i<=6; $i++){
          $date = date('Y-m-d',mktime(0,0,0,$m,($de-$i),$y));
          $query = $this->db->query("SELECT count(id_counter) as total_pengunjung FROM tbl_counter WHERE DATE(date_visit)='$date'");
          $get = $query->row();
          $tgl[] = date('d-m-Y',mktime(0,0,0,$m,($de-$i),$y));
          $total[] = $get->total_pengunjung;
      }
      echo json_encode(array("tgl" => $tgl, "total" => $total), JSON_NUMERIC_CHECK);
  }

  function get_chart_month()
  {
      $tgl = array();
      $total = array();
      $month = date("m");
      $currentdays = intval(date("t"));
      $i = 0;
      while ($i++ < $currentdays){
          $query = $this->db->query("SELECT count(id_counter) as total_pengunjung FROM tbl_counter WHERE DATE_FORMAT(date_visit, '%m')='$month' AND DATE_FORMAT(date_visit, '%e')='$i'");
          $get = $query->row();
          $tgl[] = $i."-".date("M");
          $total[] = $get->total_pengunjung;
      }
      echo json_encode(array("tgl" => $tgl, "total" => $total), JSON_NUMERIC_CHECK);
  }

  function get_chart_all()
  {
      $tgl = array();
      $total = array();
      for($i =0; $i <= 4 ;$i++)
      {
          $year = date('Y') - 4 + $i;
          $query = $this->db->query("SELECT count(id_counter) as total_pengunjung FROM tbl_counter WHERE DATE_FORMAT(date_visit, '%Y')='$year'");
          $get = $query->row();
          $tgl[] = $year;
          $total[] = $get->total_pengunjung;
      }
      echo json_encode(array("tgl" => $tgl, "total" => $total), JSON_NUMERIC_CHECK);
  }

  public function logout()
  {
  if($this->pondokkode->is_logged_in() == true)
  {
    // jika dia memang sudah login, destroy session
    $this->pondokkode->do_logout();
  }
    // larikan ke halaman utama
    $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'LOGOUT SUKSES !\',\'anda berhasil logout dari sistem.\');');

      redirect('admin');
    }

}
