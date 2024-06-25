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
      $this->load->library('form_validation');
      
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
      if (isset($_POST['cari'])) {
        //cek data apabila berhasi Di kirim maka postdata akan melakukan cek .... dan sebaliknya
        $tahun =$this->input->post('tahun');
          $x=array(
                  'judul'         =>'Data Tagihan Lain',
                  'data'          =>$this->m_tagihan_lain->view($tahun),
                  'tahun'         =>$tahun,
                  'depan'         =>FALSE);
          $this->load->view('admin/tagihan_lain/form',$x);
        }else{
          $view = array('judul'       =>'Buka Data Tagihan Lain',
                          'depan'    =>TRUE);
        $this->load->view('admin/tagihan_lain/form',$view);
      }
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
    
     //API add tagihan_lain
      public function api_add($value='')
      {
        $rules = [
          [
            'field' => 'id_pelanggan',
            'label' => 'id_pelanggan',
            'rules' => 'required'
          ],
          [
            'field' => 'tagihan',
            'label' => 'tagihan',
            'rules' => 'required'
          ],
          [
            'field' => 'status',
            'label' => 'status',
            'rules' => 'required'
          ],
          [
            'field' => 'tgl_bayar',
            'label' => 'tgl_bayar',
            'rules' => 'required'
          ],
          [
            'field' => 'keterangan',
            'label' => 'keterangan',
            'rules' => 'required'
          ]
        ];
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE) {
          $response = [
            'status' => false,
            'message' => 'Data kosong'
          ];
        } else {
          $SQLinsert=array(
            'id_tagihan_lain'     =>$this->id_tagihan_lain_urut(),
            'id_pelanggan'        =>$this->input->post('id_pelanggan'),
            'tagihan'             =>$this->input->post('tagihan'),
            'status'              =>$this->input->post('status'),
            'tgl_bayar'           =>$this->input->post('tgl_bayar'),
            'keterangan'          =>$this->input->post('keterangan')
          );
          if ($this->m_tagihan_lain->add($SQLinsert)) {
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


    //API edit tagihan_lain
      public function api_edit($id='')
      {
        $rules = [
          [
            'field' => 'tagihan',
            'label' => 'tagihan',
            'rules' => 'required'
          ],
          [
            'field' => 'status',
            'label' => 'status',
            'rules' => 'required'
          ],
          [
            'field' => 'tgl_bayar',
            'label' => 'tgl_bayar',
            'rules' => 'required'
          ],
          [
            'field' => 'keterangan',
            'label' => 'keterangan',
            'rules' => 'required'
          ]
        ];
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE) {
          $response = [
            'status' => false,
            'message' => 'Data kosong'
          ];
        } else {
          $SQLupdate=array(
            'tagihan'             =>$this->input->post('tagihan'),
            'status'              =>$this->input->post('status'),
            'tgl_bayar'           =>$this->input->post('tgl_bayar'),
            'keterangan'          =>$this->input->post('keterangan')
          );
          if ($this->m_tagihan_lain->update($id,$SQLupdate)) {
            $response = [
              'status' => true,
              'message' => 'Berhasil mengedit data'
            ];
          } else {
            $response = [
              'status' => false,
              'message' => 'Gagal mengedit data'
            ];
          }
        }
        $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($response));
      }
    
      
      //API hapus tagihan_lain
      public function api_hapus($id='')
      {
        if(empty($id)){
          $response = [
            'status' => false,
            'message' => 'Data kosong'
          ];
        }else{
          if ($this->m_tagihan_lain->delete($id)) {
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