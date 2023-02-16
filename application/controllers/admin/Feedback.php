<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Feedback extends CI_controller
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
   $this->load->model('m_feedback');
	}

    //feedback
    public function index($value='')
    {
     $view = array('judul'     =>'Data Feedback',
                   'data'      =>$this->m_feedback->view(),);
      $this->load->view('admin/feedback/form',$view);
    }
    
     //mengambil id feedback urut terakhir
     private function id_feedback_urut($value='')
     {
      $this->m_feedback->id_urut();
      $query  = $this->db->get();
      $data   = $query->row_array();
      $id     = $data['id_feedback'];
      $urut   = substr($id, 1, 3);
      $tambah = (int) $urut + 1;
      $karakter = $this->acak_id(6);
      
      if (strlen($tambah) == 1){
      $newID = "F"."00".$tambah.$karakter;
         }else if (strlen($tambah) == 2){
         $newID = "F"."0".$tambah.$karakter;
            }else (strlen($tambah) == 3){
            $newID = "F".$tambah.$karakter
              };
       return $newID;
     }

     private function tgl($value='')
     {
      $tgl=date('Y-m-d');
      return $tgl;
     }
    
     public function add($value='')
     {
      $x = array(
       'judul'              =>'Tambah Data Tagihan Lain' , 
       'aksi'               =>'tambah',
       'id_feedback'        =>$this->id_feedback_urut(),
       'nama'               =>'',
       'no_hp'              =>'',
       'nilai'              =>'',
       'feedback'           =>'',
       'tanggal'            =>$this->tgl(),
     );
       
      if (isset($_POST['kirim'])) {
                
    $SQLinsert=array(
    'id_feedback'           =>$this->id_feedback_urut(),
    'nama'                  =>$this->input->post('nama'),
    'no_hp'                 =>$this->input->post('no_hp'),
    'nilai'                 =>$this->input->post('nilai'),
    'feedback'              =>$this->input->post('feedback'),
    'tanggal'               =>$this->tgl(),
    );
    
    $cek=$this->m_feedback->add($SQLinsert);
    if($cek){
       $pesan='<script>
              swal({
                  title: "Berhasil Menyimpan Data",
                  text: "",
                  type: "success",
                  showConfirmButton: true,
                  confirmButtonText: "OKEE"
                  });
          </script>';
  	 	$this->session->set_flashdata('pesan',$pesan);
        redirect(base_url('admin/feedback'));
    }else{
    echo "QUERY SQL ERROR";
    }
    
         // }else{
         // 	echo $this->upload->display_errors();
         // }
    
       }else{
         $this->load->view('admin/feedback/feedback_form',$x);
       } 
    
     }
        
    public function edit($id='') {
        if(isset($_POST['kirim'])){
          $SQLupdate=array(
            'nilai'                    =>$this->input->post('nilai'),
            'feedback'                 =>$this->input->post('feedback'),
            'tanggal'                  =>$this->input->post('tanggal'),
          );
          $cek=$this->m_feedback->update($id,$SQLupdate);
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
         redirect(base_url('admin/feedback'));
          }
        }
      }
    
      
      public function hapus($id='')
      {
        $cek=$this->m_feedback->delete($id);
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
         redirect(base_url('admin/feedback'));
       }
      }
	
}