<?php
/*halaman login utama 

author by Ismarianto Putra TEch Programer */

class Login extends CI_controller
{
	
	function __construct()
	{
	parent::__construct();	
  $this->load->helper('url');
  // needed ???
  $this->load->database();
  $this->load->library('session');
  
	$this->load->model('Login_m');
	
	}

   public function index()
   {
   	if(isset($_POST['login'])){
      
      $nama=$this->input->post('username');
      $email=$this->input->post('username');
      $no_hp=$this->input->post('username');
      $username=$this->input->post('username');
      $password=$this->input->post('password');
     
     //cek data login
     $admin  = $this->Login_m->Admin($username,md5($password));
     $pelanggan= $this->Login_m->Pelanggan($nama,$email,$no_hp,md5($password));
     
     if($admin->num_rows() > 0 ){
        $DataAdmin=$admin->row_array();
        $sessionAdmin = array(
            'admin'    => TRUE,
        	  'id_pengguna' => $DataAdmin['id_pengguna'],
            'username' => $DataAdmin['username'],
            'password' => $DataAdmin['password'],
            'nama'     => $DataAdmin['nama'],
            'level'    => $DataAdmin['level'] );        
     $this->session->set_userdata($sessionAdmin);
     $this->session->set_flashdata('pesan','<div class="btn btn-primary">Anda Berhasil Login .....</div>');
     redirect(base_url('admin/home'));


     }elseif($pelanggan->num_rows() > 0){
        $DataPelanggan=$pelanggan->row_array();
        $sessionPelanggan = array(
            'pelanggan'     => TRUE,
            'id_pelanggan'  => $DataPelanggan['id_pelanggan'],
            'email'         => $DataPelanggan['email'],
            'no_hp'         => $DataPelanggan['no_hp'],
            'password'      => $DataPelanggan['password'],
            'nama'          => $DataPelanggan['nama'],
            'level'         => 'PLG',
              );       
    
     $this->session->set_userdata($sessionPelanggan);
     $this->session->set_flashdata('pesan','<div class="btn btn-success">Anda Berhasil Login .....</div>');
     redirect(base_url('pelanggan/home'));

     }else {
      // Periksa apakah email/username benar
      $isEmailValid = $this->Login_m->IsEmailValid($email);
      if ($isEmailValid->num_rows() > 0) {
          // Jika email benar, maka password salah
          $pesan = '<script>
          swal({
              title: "Password Salah",
              type: "error",
              showConfirmButton: true,
              confirmButtonText: "OKEE"
          });
          </script>';
          $this->session->set_flashdata('pesan', $pesan);
          redirect(base_url('login'));
        } else {
          // Jika email salah, maka email tidak terdaftar
          $pesan = '<script>
          swal({
              title: "Email / Username / No HP salah atau akun belum terdaftar",
              type: "error",
              showConfirmButton: true,
              confirmButtonText: "OKEE"
          });
          </script>';
          $this->session->set_flashdata('pesan', $pesan);
          redirect(base_url('login'));
        }
  }
}else{ 
  $x = array(
  	          'judul' =>'Login Aplikasi');
  $this->load->view('login',$x);

}

   }

}