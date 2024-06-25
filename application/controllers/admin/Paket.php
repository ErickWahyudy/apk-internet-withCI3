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
      $this->load->library('form_validation');
      
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

 //API add paket
  public function api_add($value='')
  {
    $rules = array(
      array(
        'field' => 'paket',
        'label' => 'paket',
        'rules' => 'required'
      ),
      array(
        'field' => 'tarif',
        'label' => 'tarif',
        'rules' => 'required'
      )
    );
    $this->form_validation->set_rules($rules);
    if ($this->form_validation->run() == FALSE) {
      $response = [
        'status' => false,
        'message' => 'Tidak ada data'
      ];
    } else {
      $SQLinsert = [
        'id_paket' => $this->id_paket_urut(),
        'paket' => $this->input->post('paket'),
        'tarif' => $this->input->post('tarif')
      ];
      if ($this->m_paket->paket_add($SQLinsert)) {
        $response = [
          'status' => true,
          'message' => 'Berhasil menambahkan data'
        ];
      } else {
        $response = [
          'status' => false,
          'message' => 'Gagal menambahkan data'
        ];
      }
    }
    echo json_encode($response);
  }


  //API edit paket
  public function api_edit($id='')
  {
    $rules = array(
      array(
        'field' => 'paket',
        'label' => 'paket',
        'rules' => 'required'
      ),
      array(
        'field' => 'tarif',
        'label' => 'tarif',
        'rules' => 'required'
      )
    );
    $this->form_validation->set_rules($rules);
    if ($this->form_validation->run() == FALSE) {
      $response = [
        'status' => false,
        'message' => 'Tidak ada data'
      ];
    } else {
      $SQLupdate = [
        'paket' => $this->input->post('paket'),
        'tarif' => $this->input->post('tarif')
      ];
      if ($this->m_paket->paket_update($id, $SQLupdate)) {
        $response = [
          'status' => true,
          'message' => 'Berhasil mengubah data'
        ];
      } else {
        $response = [
          'status' => false,
          'message' => 'Gagal mengubah data'
        ];
      }
    }
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($response));
  }

       //mengompres ukuran gambar
       private function compress($source, $destination, $quality) 
       {
           $info = getimagesize($source);
           if ($info['mime'] == 'image/jpeg') 
               $image = imagecreatefromjpeg($source);
           elseif ($info['mime'] == 'image/gif') 
               $image = imagecreatefromgif($source);
           elseif ($info['mime'] == 'image/png') 
               $image = imagecreatefrompng($source);
           imagejpeg($image, $destination, $quality);
           return $destination;
       }
 
       private function berkas($id='')
     {
       if ($_FILES['foto']['name'] != '') {
       $config['upload_path']          = './themes/qris/';
       $config['allowed_types']        = 'gif|jpg|png|jpeg|JPEG|JPG|PNG';
       $config['max_size']             = 10000;
       $config['max_width']            = 10000;
       $config['max_height']           = 10000;
       $config['file_name']            = 'qris_' . uniqid();
       $this->load->library('upload', $config);
       if (!$this->upload->do_upload('foto')) {
         $error = array('error' => $this->upload->display_errors());
         $this->session->set_flashdata('error', $error['error']);
         redirect('admin/paket/' . $id . '');
       } else {
         $data = array('upload_data' => $this->upload->data());
         $this->compress($data['upload_data']['full_path'], $data['upload_data']['full_path'], 90);
         return $data['upload_data']['file_name'];
       }
     } else {
       return '';
     }
     }
 
       //API upload foto ke database dan folder
       public function api_upload($id='', $SQLupdate='')
       {
         if (empty($_FILES['foto']['name'])) {
           $data = [
             'status'  => 'error',
             'message' => 'Tidak Ada File Yang Diupload',
           ];
         } else {
           $SQLupdate = [
             'qris'    => $this->berkas($id)
           ];
           if ($this->m_paket->paket_update($id, $SQLupdate)) {
             $data = [
               'status'  => 'success',
               'message' => 'Berhasil Upload File',
             ];
           } else {
             $data = [
               'status'  => 'error',
               'message' => 'Gagal Upload File',
             ];
           }
         }
         $this->output
           ->set_content_type('application/json')
           ->set_output(json_encode($data));
       }

  //API hapus data dari database dan folder
  public function api_hapusfoto($id='')
  {
    if (empty($id)) {
      $response = [
        'status' => false,
        'message' => 'Tidak ada data'
      ];
    } else {
      $data = $this->m_paket->paket_view_id($id)->row_array();
      $file = $data['qris'];
      unlink('./themes/qris/' . $file);

      //SQL update
      $SQLupdate = [
        'qris'    => ''
      ];
      if ($this->m_paket->paket_update($id, $SQLupdate)) {
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

	
	//API hapus paket
  public function api_hapus($id='')
  {
    if(empty($id)){
      $response = [
        'status' => false,
        'message' => 'Data kosong'
      ];
    }else{
      if ($this->m_paket->paket_delete($id)) {
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
?>