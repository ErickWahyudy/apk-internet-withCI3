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
      $this->load->library('form_validation');
      
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


  //API add feedback
  public function api_add($value='')
  {
    $rules = array(
      array(
        'field' => 'nama',
        'label' => 'nama',
        'rules' => 'required'
      ),
      array(
        'field' => 'no_hp',
        'label' => 'no_hp',
        'rules' => 'required'
      ),
      array(
        'field' => 'feedback',
        'label' => 'feedback',
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
        'id_feedback'      =>$this->id_feedback_urut(),
        'nama'             =>$this->input->post('nama'),
        'no_hp'            =>$this->input->post('no_hp'),
        'nilai'            =>$this->input->post('nilai'),
        'feedback'         =>$this->input->post('feedback'),
        'tanggal'          =>$this->input->post('tanggal')
      ];
      if ($this->m_feedback->add($SQLinsert)) {
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
  
  $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($response));
}

      //API edit feedback
      public function api_edit($id='', $SQLupdate='')
      {
        $rules = array(
          array(
            'field' => 'nilai',
            'label' => 'nilai',
            'rules' => 'required'
          ),
          array(
            'field' => 'feedback',
            'label' => 'feedback',
            'rules' => 'required'
          ),
          array(
            'field' => 'tanggal',
            'label' => 'tanggal',
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
            'nilai' => $this->input->post('nilai'),
            'feedback' => $this->input->post('feedback'),
            'tanggal' => $this->input->post('tanggal')
          ];
          if ($this->m_feedback->update($id, $SQLupdate)) {
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
      
      //API hapus feedback
      public function api_hapus($id='')
      {
        if(empty($id)){
          $response = [
            'status' => false,
            'message' => 'Data kosong'
          ];
        }else{
          if ($this->m_feedback->delete($id)) {
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