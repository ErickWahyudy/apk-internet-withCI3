<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Tagihan_lain extends CI_controller
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
   $this->load->model('m_tagihan_lain');
	}


    //tagihan_lain
    public function index($value='')
    {
     $view = array('judul'  =>'Data Tagihan Lain',
                'data'      =>$this->m_tagihan_lain->view(),);
      $this->load->view('admin/tagihan_lain/tagihan_lain',$view);
    }

    private function acak_id($panjang)
    {
        $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
        $string = '';
        for ($i = 0; $i < $panjang; $i++) {
            $pos = rand(0, strlen($karakter) - 1);
            $string .= $karakter{$pos};
        }
        return $string;
    }
    
     //mengambil id tagihan_lain urut terakhir
     private function id_tagihan_lain_urut($value='')
     {
      $this->m_tagihan_lain->id_urut();
      $query    = $this->db->get();
      $data     = $query->row_array();
      $id       = $data['id_tagihan_lain'];
      $urut     = substr($id, 1, 3);
      $tambah   = (int) $urut + 1;
      $karakter = $this->acak_id(6);
      
      if (strlen($tambah) == 1){
      $newID = "L"."00".$tambah.$karakter;
         }else if (strlen($tambah) == 2){
         $newID = "L"."0".$tambah.$karakter;
            }else (strlen($tambah) == 3){
            $newID = "L".$tambah.$karakter
              };
       return $newID;
     }
    
     public function add($value='')
     {
      $x = array(
       'judul'              =>'Tambah Data Tagihan Lain' , 
       'aksi'               =>'tambah',
       'id_tagihan_lain'    =>$this->id_tagihan_lain_urut(),
       'pelanggan'          =>$this->db->get('tb_pelanggan')->result_array(),
       'tagihan'            =>'',
       'status'             =>'',
       'tgl_bayar'          =>'',
       'keterangan'         =>'',
     );
       
      if (isset($_POST['kirim'])) {
                
    $SQLinsert=array(
    'id_tagihan_lain'     =>$this->id_tagihan_lain_urut(),
    'id_pelanggan'        =>$this->input->post('id_pelanggan'),
    'tagihan'             =>$this->input->post('tagihan'),
    'status'              =>$this->input->post('status'),
    'tgl_bayar'           =>$this->input->post('tgl_bayar'),
    'keterangan'          =>$this->input->post('keterangan')
    );
    
    $cek=$this->m_tagihan_lain->add($SQLinsert);
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
        redirect(base_url('admin/tagihan_lain'));
    }else{
    echo "QUERY SQL ERROR";
    }
    
         // }else{
         // 	echo $this->upload->display_errors();
         // }
    
       }else{
         $this->load->view('admin/tagihan_lain/tagihan_lain_form',$x);
       } 
    
     }
        
    public function edit($id='')
      {
      $data=$this->m_tagihan_lain->view_id($id)->row_array();
      if (empty($data['id_tagihan_lain'])) {
        $pesan='<script>
                  swal({
                      title: "Gagal Edit Data",
                      text: "ID Tagihan Lain Tidak Ditemukan",
                      type: "error",
                      showConfirmButton: true,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "OK",
                      closeOnConfirm: false
                  },
                  function(){
                      window.location.href="'.base_url('admin/tagihan_lain').'";
                  });
                </script>';
        $this->session->set_flashdata('pesan',$pesan);
        redirect(base_url('admin/tagihan_lain'));
      }

      $x = array('judul'                =>'Edit Data Tagihan Lain' ,
                  'aksi'                =>'edit',
                  'id_tagihan_lain'     =>$data['id_tagihan_lain'],
                  'id_pelanggan'        =>$data['id_pelanggan'],
                  'nama'                =>$data['nama'],
                  'status'              =>$data['status'],
                  'tgl_bayar'           =>$data['tgl_bayar'],
                  'tagihan'             =>$data['tagihan'],
                  'keterangan'          =>$data['keterangan'],
                );	
        if(isset($_POST['kirim'])){
          $SQLupdate=array(
            'status'                    =>$this->input->post('status'),
            'tgl_bayar'                 =>$this->input->post('tgl_bayar'),
            'tagihan'                   =>$this->input->post('tagihan'),
            'keterangan'                =>$this->input->post('keterangan'),
          );
          $cek=$this->m_tagihan_lain->update($id,$SQLupdate);
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
         redirect(base_url('admin/tagihan_lain'));
          }else{
           echo "ERROR input Data";
          }
        }else{
         $this->load->view('admin/tagihan_lain/tagihan_lain_form',$x);
        }
      }
    
      
      public function hapus($id='')
      {
        $cek=$this->m_tagihan_lain->delete($id);
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
         redirect(base_url('admin/tagihan_lain'));
       }
      }

	
}