<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Paket extends CI_controller
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

   $this->load->model('m_paket');
	}


public function index($value='')
{
 $view = array('judul'  =>'Data Paket Internet',
            'data'      =>$this->m_paket->paket_view(),);
   $this->load->view('admin/paket/form',$view);
}

 //mengambil id paket urut terakhir
 private function id_paket_urut($value='')
 {
  $this->m_paket->id_paket_urut();
  $query  = $this->db->get();
  $data   = $query->row_array();
  $id     = $data['id_paket'];
  $urut   = substr($id, 1, 3);
  $tambah = (int) $urut + 1;
  
  if (strlen($tambah) == 1){
  $newID = "P"."00".$tambah;
     }else if (strlen($tambah) == 2){
     $newID = "P"."0".$tambah;
        }else (strlen($tambah) == 3){
        $newID = "P".$tambah
          };
   return $newID;
 }

 public function add($value='') {  
  if (isset($_POST['kirim'])) {
            
$SQLinsert=array(
'id_paket'      =>$this->id_paket_urut(),
'paket'         =>$this->input->post('paket'),
'tarif'         =>$this->input->post('tarif')
);

$cek=$this->m_paket->paket_add($SQLinsert);
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
    redirect(base_url('admin/paket'));
  }
  }

 }
    
    public function edit($id='') {
    if(isset($_POST['kirim'])){
      $SQLupdate=array(
      	'paket'         =>$this->input->post('paket'),
        'tarif'         =>$this->input->post('tarif'));
      $cek=$this->m_paket->paket_update($id,$SQLupdate);
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
	 	redirect(base_url('admin/paket'));
      }
    }
	}

	
	public function hapus($id='')
	{
    $cek=$this->m_paket->paket_delete($id);
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
	 	redirect(base_url('admin/paket'));
	 }
	}

	
}