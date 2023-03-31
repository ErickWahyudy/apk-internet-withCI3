<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class User_admin extends CI_controller
{
	function __construct()
	{
	 parent:: __construct();
     $this->load->helper('url');
      // needed ???
      $this->load->database();
      $this->load->library('session');
      $this->load->library('form_validation');
      
	 // error_reporting(0);
	 if($this->session->userdata('admin') != TRUE){
     redirect(base_url(''));
     exit;
	};
	 $this->load->model('m_admin');
	}

//user_admin
public function index($value='')
{
 $view = array('judul'  =>'Data Admin',
            'data'      =>$this->m_admin->view(),);
  $this->load->view('admin/user/user_admin',$view);
}


public function tambah($value='') {
  if (isset($_POST['kirim'])) {
            
$SQLinsert=array(
'nama'                =>$this->input->post('nama'),
'username'            =>$this->input->post('username'),
'password'            =>md5($this->input->post('password')),
'level'               =>'Administrator'
);

$cek=$this->m_admin->add($SQLinsert);
if($cek){
   $pesan='<script>
              swal({
                  title: "Berhasil Menambahkan Data",
                  text: "",
                  type: "success",
                  showConfirmButton: true,
                  confirmButtonText: "OKEE"
                  });
          </script>';
  	 	$this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/user_admin'));
    }
  }
}

//API add admin
public function api_add($value='')
{
  $rules = array(
    array(
      'field' => 'nama',
      'label' => 'Nama',
      'rules' => 'required'
    ),
    array(
      'field' => 'username',
      'label' => 'Username',
      'rules' => 'required'
    ),
    array(
      'field' => 'password',
      'label' => 'Password',
      'rules' => 'required'
    )
  );
  $this->form_validation->set_rules($rules);
  if ($this->form_validation->run() == FALSE) {
    $pesan = array(
      'status' => 'error',
      'pesan' => validation_errors()
    );
  }else{
    $SQLinsert = [
      'nama'                =>$this->input->post('nama'),
      'username'            =>$this->input->post('username'),
      'password'            =>md5($this->input->post('password')),
      'level'               =>'Administrator'
    ];
    $cek=$this->m_admin->add($SQLinsert);
    if($cek){
      $pesan = array(
        'status' => 'success',
        'pesan' => 'Berhasil Menambahkan Data'
      );
    }else{
      $pesan = array(
        'status' => 'error',
        'pesan' => 'Gagal Menambahkan Data'
      );
    }
  }
  echo json_encode($pesan);
}

    
  public function edit($id='') {	
    if(isset($_POST['kirim'])){
      $SQLupdate=array(
      	'nama'                      =>$this->input->post('nama'),
        'username'                  =>$this->input->post('username'),
        'password'                  =>md5($this->input->post('password')),
      );
      $cek=$this->m_admin->update($id,$SQLupdate);
      if($cek){
       $pesan='<script>
              swal({
                  title: "Berhasil Edit Data",
                  text: "",
                  type: "success",
                  showConfirmButton: true,
                  confirmButtonText: "OKEE"
                  });
          </script>';
  	 	$this->session->set_flashdata('pesan',$pesan);
	 	redirect(base_url('admin/user_admin'));
      }
    }
	}

  //API edit admin
  public function api_edit($id='')
  {
    $rules = array(
      array(
        'field' => 'nama',
        'label' => 'Nama',
        'rules' => 'required'
      ),
      array(
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'required'
      ),
      array(
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required'
      )
    );
    $this->form_validation->set_rules($rules);
    if ($this->form_validation->run() == FALSE) {
      $pesan = array(
        'status' => 'error',
        'pesan' => validation_errors()
      );
    }else{
      $SQLupdate = [
        'nama'                      =>$this->input->post('nama'),
        'username'                  =>$this->input->post('username'),
        'password'                  =>md5($this->input->post('password'))
      ];
      $cek=$this->m_admin->update($id,$SQLupdate);
      if($cek){
        $pesan = array(
          'status' => 'success',
          'pesan' => 'Berhasil Edit Data'
        );
      }else{
        $pesan = array(
          'status' => 'error',
          'pesan' => 'Gagal Edit Data'
        );
      }
  }
  echo json_encode($pesan);
}

	
	//API hapus admin
  public function api_hapus($id='')
  {
    if(empty($id)){
      $response = [
        'status' => false,
        'message' => 'Data kosong'
      ];
    }else{
      if ($this->m_admin->delete($id)) {
        $response = [
          'status' => true,
          'message' => 'Berhasil menghapus data'
        ];
      } else {
        $response = [
          'status' => false,
          'message' => 'Gagal menghapus data'
        ];
      }
    }
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($response));
  }

	
}