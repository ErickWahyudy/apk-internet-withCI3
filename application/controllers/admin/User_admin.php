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


public function tambah($value='')
 {
  $x = array(
   'judul'              =>'Tambah Data admin' , 
   'aksi'               =>'tambah',
   'nama'               =>'',
   'username'           =>'',
   'password'           =>'',
   'level'              =>'Administrator',
 );
   
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
}else{
echo "QUERY SQL ERROR";
}

     // }else{
     // 	echo $this->upload->display_errors();
     // }

   }else{
     $this->load->view('admin/user/user_admin_form',$x);
   } 

  }

    
  public function edit($id='')
	{
  $data=$this->m_admin->admin($id)->row_array();
  if (empty($data['id_pengguna'])) {
    $pesan='<script>
              swal({
                  title: "Gagal Edit Data",
                  text: "ID Pengguna Tidak Ditemukan",
                  type: "error",
                  showConfirmButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "OK",
                  closeOnConfirm: false
              },
              function(){
                  window.location.href="'.base_url('admin/user_admin').'";
              });
            </script>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/user_admin'));
  }

	$x = array('judul'                =>'Edit Admin' ,
	            'aksi'                =>'edit',
              'id_pengguna'         =>$data['id_pengguna'],
              'nama'                =>$data['nama'],
              'username'            =>$data['username'],
              'password'            =>$data['password'],
              'level'               =>$data['level'],
            );	
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
      }else{
       echo "ERROR input Data";
      }
    }else{
     $this->load->view('admin/user/user_admin_form',$x);
    }
	}

	
	public function hapus($id='')
	{
    $cek=$this->m_admin->delete($id);
	 if ($cek) {
	 	$pesan='<script>
              swal({
                  title: "Berhasil Hapus Data",
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

public function keluar($value='')
{

$this->session->sess_destroy();
echo "<script>alert('Anda Telah Keluar Dari Halaman Administrator')</script>";;
redirect(base_url(''));
}

	
}