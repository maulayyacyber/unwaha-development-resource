<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class admin extends MX_Controller {

function _construct(){
parent::__construct();
if(!$this->session->sess_read()){
    $data['login_info'] = '';
    $this->load->view('login',$data);
}
}

	public function index()
	{

    if($this->pondokkode->is_logged_in() == false)
		{
			$username = mysql_real_escape_string($this->input->post('username'));
			$password = mysql_real_escape_string($this->input->post('password'));
			$aktif    = 1;
			$success = $this->pondokkode->do_login($username,$password,$aktif);
			if($success)
      {
				redirect('admin/dashboard');
			}else{
        $data['login_info'] = '';
				$this->load->view('login',$data);
			}
		}
		else
		{
				redirect('admin/dashboard');
		}
	}

    public function auth()
    {
      $username = mysql_real_escape_string($this->input->post('username'));
			$password = mysql_real_escape_string($this->input->post('password'));
      //$status = "logout";
      $aktif  = 1;
			$success = $this->pondokkode->do_login($username,$password,$aktif);

			if($success)
			{
				redirect('admin/dashboard');
			}
			else
			{

          $this->session->set_flashdata('pesan_notif', 'loginGagal(\'error\',\'\',\'<strong>Username</strong> atau <strong>Password</strong> yang anda masukan salah.\');');
                 redirect(site_url('admin'));
			}
    }

    public function send_reset_password()
    {
         $email_me  = $_SESSION['smtp_user'];
         $nama_me   = $_SESSION['admin_title'];
         $email_to  = $this->input->post("email_user");
         $query     = $this->db->query("SELECT id_user FROM tbl_user WHERE email_user='$email_to'")->row();
         $this->load->helper('string');
         $password= random_string('alnum', 6);
         $this->db->where('id_user', $query->id_user);
         $this->db->update('tbl_user',array('pass_user'=>MD5($password)));
         $config = array(
            'protocol'  => $_SESSION['protocol'],
            'smtp_host' => $_SESSION['smtp_host'],
            'smtp_user' => $_SESSION['smtp_user'],
            'smtp_pass' => $_SESSION['smtp_pass'],
            'smtp_port' => $_SESSION['smtp_port'],
            'mailtype'  => 'html',
            'starttls'  => true,
            'newline'   => "\r\n"
        );

        $this->load->library('email', $config);
        $this->email->from($email_me, $nama_me);
        $this->email->to($email_to); // ganti dengan email tujuan
        $this->email->subject('Reset Password');
        $data = array( 'message' => "Permintaan password baru Anda adalah : <b>".$password."</b>");
        $email = $this->load->view('email/template_reset_password', $data, TRUE);

        $this->email->message( $email );

        if ($this->email->send()) {
            $this->session->set_flashdata('pesan_notif', 'PesanNotif(\'success\',\'Reset Password Success\',\'Password Anda sudah dikirim ke email: <strong>'.$email_to.'</strong>. Silahkan cek email Anda.\');');
            redirect(base_url().'admin');
        }
        else {
            show_error($this->email->print_debugger(), true);
        }
    }

    function cek_email()
    {
          $email = $_POST["email"];
          $query = $this->db->query("SELECT id_user FROM tbl_user WHERE email_user='$email'");
          if(($query->num_rows())>0)
          {
             echo "true";
          }else{
             echo "false";
          }
    }

}

/* End of file admin.php */
/* Location: ./application/pondokkode/admin/controllers/admin.php */
