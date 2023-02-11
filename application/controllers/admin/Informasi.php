<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Informasi extends CI_controller
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
    $this->load->model('m_informasi');
	}

      //informasi
  public function index($value='')
  {
    $kode_tahun = date('Y');
    $view = array('judul'   =>'Data Informasi',
              'data'        =>$this->m_informasi->view(),);
     $this->load->view('admin/informasi/informasi',$view);
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
  
   //mengambil id informasi urut terakhir
   private function id_informasi_urut($value='')
   {
    $this->m_informasi->id_urut();
    $query    = $this->db->get();
    $data     = $query->row_array();
    $id       = $data['id_informasi'];
    $urut     = substr($id, 1, 3);
    $tambah   = (int) $urut + 1;
    $karakter = $this->acak_id(6);
    
    if (strlen($tambah) == 1){
    $newID = "I"."00".$tambah.$karakter;
       }else if (strlen($tambah) == 2){
       $newID = "I"."0".$tambah.$karakter;
          }else (strlen($tambah) == 3){
          $newID = "I".$tambah.$karakter
            };
     return $newID;
   }

    
   public function add($value='')
   {
    $x = array(
     'judul'              =>'Tambah Data Informasi Layanan' , 
     'aksi'               =>'tambah',
     'id_informasi'       =>$this->id_informasi_urut(),
     'informasi'          =>'',
   );
     
    if (isset($_POST['kirim'])) {
              
  $SQLinsert=array(
  'id_informasi'      =>$this->id_informasi_urut(),
  'informasi'         =>$this->input->post('informasi'),
  );
  
  $cek=$this->m_informasi->add($SQLinsert);
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
      redirect(base_url('admin/informasi'));
  }else{
  echo "QUERY SQL ERROR";
  }
  
       // }else{
       // 	echo $this->upload->display_errors();
       // }
  
     }else{
       $this->load->view('admin/informasi/informasi_form',$x);
     } 
  
   }
      
      public function edit($id='')
    {
    $data=$this->m_informasi->view_id($id)->row_array();
    if (empty($data['id_informasi'])) {
      $pesan='<script>
                swal({
                    title: "Gagal Edit Data",
                    text: "ID Informasi Tidak Ditemukan",
                    type: "error",
                    showConfirmButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "OK",
                    closeOnConfirm: false
                },
                function(){
                    window.location.href="'.base_url('admin/informasi').'";
                });
              </script>';
      $this->session->set_flashdata('pesan',$pesan);
      redirect(base_url('admin/informasi'));
    }

    $x = array('judul'                =>'Edit Data informasi' ,
                'aksi'                =>'edit',
                'id_informasi'        =>$data['id_informasi'],
                'informasi'           =>$data['informasi'],
              );	
      if(isset($_POST['kirim'])){
        $SQLupdate=array(
          'informasi'               =>$this->input->post('informasi'),
        );
        $cek=$this->m_informasi->update($id,$SQLupdate);
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
       redirect(base_url('admin/informasi'));
        }else{
         echo "ERROR input Data";
        }
      }else{
       $this->load->view('admin/informasi/informasi_form',$x);
      }
    }

    private function berkas($value='')
    {
      $config['upload_path']          = './template/file_informasi/';
      $config['allowed_types']        = 'pdf|doc|docx|xls|xlsx|ppt|pptx|jpg|png|jpeg|txt';
      $config['max_size']             = 10000;
      $config['max_width']            = 10000;
      $config['max_height']           = 10000;
      $config['encrypt_name']         = FALSE;
      $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload('berkas')){
        $pesan='<script>
                swal({
                    title: "Ekstensi File Tidak Sesuai",
                    text: "",
                    type: "error",
                    showConfirmButton: true,
                    confirmButtonText: "OKEE"
                    });
            </script>';
        $this->session->set_flashdata('pesan',$pesan);
        redirect(base_url('admin/informasi'));
      }else{
        $data = array('upload_data' => $this->upload->data());
        return $data['upload_data']['file_name'];
      }
    }

    public function file($id='')
    {
    $data=$this->m_informasi->view_id($id)->row_array();
    $x = array('judul'                =>'Edit Data informasi' ,
                'aksi'                =>'uploadfile',
                'id_informasi'        =>$data['id_informasi'],
                'informasi'           =>$data['informasi'],
                'berkas'              =>$data['berkas'],
              );	
      if(isset($_POST['kirim'])){
        $SQLupdate=array(
          'berkas'               =>$this->berkas(),
        );
        $cek=$this->m_informasi->update($id,$SQLupdate);
        if($cek){
         $pesan='<script>
                swal({
                    title: "Berhasil Upload file informasi",
                    text: "",
                    type: "success",
                    showConfirmButton: true,
                    confirmButtonText: "OKEE"
                    });
            </script>';
         $this->session->set_flashdata('pesan',$pesan);
       redirect(base_url('admin/informasi'));
        }else{
         echo "ERROR input Data";
        }
      }else{
       $this->load->view('admin/informasi/informasi_form',$x);
      }
    }
  
    
    public function hapus($id='')
    {
      //hapus file di folder berdasarkan id
      $data=$this->m_informasi->view_id($id)->row_array();
      $file=$data['berkas'];
      unlink('./template/file_informasi/'.$file);
      //hapus data di database
      $cek=$this->m_informasi->delete($id);
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
       redirect(base_url('admin/informasi'));
     }
    }
 
	
}