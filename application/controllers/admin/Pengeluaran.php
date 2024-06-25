<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Pengeluaran extends CI_controller
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
   $this->load->model('m_pengeluaran');
	}

  
  //pengeluaran
  public function index($value='')
{
  if (isset($_POST['cari'])) {
    //cek data apabila berhasi Di kirim maka postdata akan melakukan cek .... dan sebaliknya
    $tahun =$this->input->post('tahun');
     $x=array(
            'judul'         =>'Data Tagihan Pengeluaran',
            'data'          =>$this->m_pengeluaran->view($tahun),
            'pengeluaran'   => $this->db->select_sum('biaya_pengeluaran')->get_where('tb_pengeluaran',array('keterangan'=>'LUNAS','YEAR(tanggal)'=>$tahun))->num_rows() > 0 ? $this->db->select_sum('biaya_pengeluaran')->get_where('tb_pengeluaran',array('keterangan'=>'LUNAS','YEAR(tanggal)'=>$tahun))->row()->biaya_pengeluaran : 0,
            'tahun'    =>$tahun,
            'depan'    =>FALSE);
     $this->load->view('admin/pengeluaran/form',$x);
   }else{
    $view = array('judul'  =>'Buka Data Pengeluaran',
                    'depan'    =>TRUE);
   $this->load->view('admin/pengeluaran/form',$view);
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

 //mengambil id pengeluaran urut terakhir
 private function id_pengeluaran_urut($value='')
 {
  $this->m_pengeluaran->id_urut();
  $query    = $this->db->get();
  $data     = $query->row_array();
  $id       = $data['id_pengeluaran'];
  $urut     = substr($id, 1, 3);
  $tambah   = (int) $urut + 1;
  $karakter = $this->acak_id(6);
  
  if (strlen($tambah) == 1){
  $newID = "S"."00".$tambah.$karakter;
     }else if (strlen($tambah) == 2){
     $newID = "S"."0".$tambah.$karakter;
        }else (strlen($tambah) == 3){
        $newID = "S".$tambah.$karakter
          };
   return $newID;
 }

 //API add pengeluaran
  public function api_add($value='')
  {
    $rules = array(
      array(
        'field' => 'jenis_pengeluaran',
        'label' => 'jenis_pengeluaran',
        'rules' => 'required'
      ),
      array(
        'field' => 'biaya_pengeluaran',
        'label' => 'biaya_pengeluaran',
        'rules' => 'required'
      ),
      array(
        'field' => 'tanggal',
        'label' => 'tanggal',
        'rules' => 'required'
      ),
      array(
        'field' => 'keterangan',
        'label' => 'keterangan',
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
        'id_pengeluaran'      =>$this->id_pengeluaran_urut(),
        'jenis_pengeluaran'   =>$this->input->post('jenis_pengeluaran'),
        'biaya_pengeluaran'   =>$this->input->post('biaya_pengeluaran'),
        'tanggal'             =>$this->input->post('tanggal'),
        'keterangan'          =>$this->input->post('keterangan')
      ];
      if ($this->m_pengeluaran->add($SQLinsert)) {
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

  //API edit pengeluaran
  public function api_edit($id='')
  {
    $rules = array(
      array(
        'field' => 'jenis_pengeluaran',
        'label' => 'jenis_pengeluaran',
        'rules' => 'required'
      ),
      array(
        'field' => 'biaya_pengeluaran',
        'label' => 'biaya_pengeluaran',
        'rules' => 'required'
      ),
      array(
        'field' => 'tanggal',
        'label' => 'tanggal',
        'rules' => 'required'
      ),
      array(
        'field' => 'keterangan',
        'label' => 'keterangan',
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
        'jenis_pengeluaran' => $this->input->post('jenis_pengeluaran'),
        'biaya_pengeluaran' => $this->input->post('biaya_pengeluaran'),
        'tanggal'           => $this->input->post('tanggal'),
        'keterangan'        => $this->input->post('keterangan')
      ];
      if ($this->m_pengeluaran->update($id, $SQLupdate)) {
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

  
  //API hapus pengeluaran
  public function api_hapus($id='')
  {
    if(empty($id)){
      $response = [
        'status' => false,
        'message' => 'Data kosong'
      ];
    }else{
      if ($this->m_pengeluaran->delete($id)) {
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