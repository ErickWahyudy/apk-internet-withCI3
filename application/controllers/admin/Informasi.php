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
      $this->load->library('form_validation');
      
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
     $this->load->view('admin/informasi/form',$view);
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


//API Add Informasi
public function api_add($value='')
{
  $this->form_validation->set_rules('informasi', 'Informasi', 'required');
  if ($this->form_validation->run() == FALSE) {
    $SQLinsert = [
      'id_informasi'  => $this->id_informasi_urut(),
      'informasi'     => $this->input->post('informasi'),
    ];
    if ($this->m_informasi->add($SQLinsert)) {
      $data = [
        'status'  => 'success',
        'message' => 'Berhasil Menambahkan Data',
      ];
      
    }
    //mengirim email ke pelanggan dengan phpmailer
    
  } else {
    $data = [
      'status'  => 'error',
      'message' => 'Gagal Menambahkan Data',
    ];
  }

  echo json_encode($data);
}

    //API Edit Informasi
    public function api_edit($id='')
    {
      $this->form_validation->set_rules('informasi', 'Informasi', 'required');
      if ($this->form_validation->run() == FALSE) {
        $SQLupdate = [
          'informasi'     => $this->input->post('informasi'),
        ];
        if ($this->m_informasi->update($id,$SQLupdate)) {
          $data = [
            'status'  => 'success',
            'message' => 'Berhasil Mengedit Data',
          ];
         
      }
      //mengirim email ke pelanggan dengan phpmailer
      
      } else {
        $data = [
          'status'  => 'error',
          'message' => 'Gagal Mengedit Data',
        ];
      }
     
      echo json_encode($data);
    }
    
    
    private function berkas($id='')
    {
      if ($_FILES['berkas']['name'] != '') {
      $config['upload_path']          = './themes/file_informasi/';
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
        $data = $this->upload->data();
        return $data['file_name'];
      }
    }
    }
 
    //API Upload File Informasi ke Database dan Folder
    public function api_file($id='')
    {
      if (empty($_FILES['berkas']['name'])) {
        $data = [
          'status'  => 'error',
          'message' => 'Tidak Ada File Yang Diupload',
        ];
      } else {
        $SQLupdate = [
          'berkas'     => $this->berkas(),
        ];
        if ($this->m_informasi->update($id,$SQLupdate)) {
          $data = [
            'status'  => 'success',
            'message' => 'Berhasil Upload File',
          ];
         
        }
      }     
     
      echo json_encode($data);
    }


    //API Hapus Informasi
    public function api_hapus($id='')
    {
      $this->form_validation->set_rules('id_informasi', 'ID Informasi', 'required');
      //hapus file di folder berdasarkan id
      $data=$this->m_informasi->view_id($id)->row_array();
      if ($data['berkas'] != '') {
        $file=$data['berkas'];
        unlink('./themes/file_informasi/'.$file);
      }
      //hapus data di database
      if (empty($id)) {
        $data = [
          'status'  => 'error',
          'message' => 'ID Informasi Tidak Ditemukan',
        ];
      } else {
        if ($this->m_informasi->delete($id)) {
          $data = [
            'status'  => 'success',
            'message' => 'Berhasil Menghapus Data',
          ];
        } else {
          $data = [
            'status'  => 'error',
            'message' => 'Gagal Menghapus Data',
          ];
        }
        
      }

      echo json_encode($data);
    }
 
	
}
?>