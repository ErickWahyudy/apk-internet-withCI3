<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Promo extends CI_controller
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
   $this->load->model('m_pelanggan');
   $this->load->model('m_promo');
   $this->load->model('m_paket');
	}


public function index($value='')
{
 $view = array('judul'  =>'Data Promo',
               'data'      =>$this->m_promo->promo_view(),);
   $this->load->view('admin/promo/promo',$view);
}

public function edit($id='')
	{
  $data=$this->m_promo->promo_view_id($id)->row_array();
  if (empty($data['id_promo'])) {
    $pesan='<script>
              swal({
                  title: "Gagal Edit Data",
                  text: "ID Promo Tidak Ditemukan",
                  type: "error",
                  showConfirmButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "OK",
                  closeOnConfirm: false
              },
              function(){
                  window.location.href="'.base_url('admin/promo').'";
              });
            </script>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/promo'));
  }

	$x = array('judul'              =>'Edit Data Promo' ,
	            'aksi'              =>'edit',
              'id_promo'          =>$data['id_promo'],
              'biaya_asli'        =>$data['biaya_asli'],
              'biaya_promo'       =>$data['biaya_promo'],
              'status'            =>$data['status'],
              );
    if(isset($_POST['kirim'])){
      $SQLupdate2=array(
        'biaya_asli'              =>$this->input->post('biaya_asli'),
      	'biaya_promo'             =>$this->input->post('biaya_promo'),
        'status'                  =>$this->input->post('status'));
      $cek=$this->m_promo->promo_update($id,$SQLupdate2);
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
	 	redirect(base_url('admin/promo'));
      }else{
       echo "ERROR input Data";
      }
    }else{
     $this->load->view('admin/promo/promo_edit',$x);
    }
	}


public function hapus($id='')
	{
    //hapus file di folder berdasarkan id
    $data=$this->m_promo->promo_view_id($id)->row_array();
    $promo_del=$data['bukti_ktp'];
    $promo_del2=$data['signature'];
    unlink('./themes/bukti_ktp/'.$promo_del);
    unlink('./themes/signature/'.$promo_del2);
    //hapus data di database
    $cek=$this->m_promo->delete_promo($id);
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
	 	redirect(base_url('admin/promo'));
	 }
	}


}