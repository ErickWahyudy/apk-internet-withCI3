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
  $view = array('judul'  =>'Data Pengeluaran',
            'data'        =>$this->m_pengeluaran->view(),
            'pengeluaran'    => $this->db->select_sum('biaya_pengeluaran')->get_where('tb_pengeluaran',array('keterangan'=>'LUNAS','YEAR(tanggal)'=>date('Y')))->num_rows() > 0 ? $this->db->select_sum('biaya_pengeluaran')->get_where('tb_pengeluaran',array('keterangan'=>'LUNAS','YEAR(tanggal)'=>date('Y')))->row()->biaya_pengeluaran : 0,);
   $this->load->view('admin/pengeluaran/form',$view);
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

 public function add($value='') {

  if (isset($_POST['kirim'])) {
            
$SQLinsert=array(
'id_pengeluaran'      =>$this->id_pengeluaran_urut(),
'jenis_pengeluaran'   =>$this->input->post('jenis_pengeluaran'),
'biaya_pengeluaran'   =>$this->input->post('biaya_pengeluaran'),
'tanggal'             =>$this->input->post('tanggal'),
'keterangan'          =>$this->input->post('keterangan')
);

$cek=$this->m_pengeluaran->add($SQLinsert);
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
    redirect(base_url('admin/pengeluaran'));
    }
   }
 }
    
    public function edit($id='') {
    if(isset($_POST['kirim'])){
      $SQLupdate=array(
      	'jenis_pengeluaran'         =>$this->input->post('jenis_pengeluaran'),
        'biaya_pengeluaran'         =>$this->input->post('biaya_pengeluaran'),
        'tanggal'                   =>$this->input->post('tanggal'),
        'keterangan'                =>$this->input->post('keterangan'),
      );
      $cek=$this->m_pengeluaran->update($id,$SQLupdate);
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
	 	redirect(base_url('admin/pengeluaran'));
      }
    }
	}

	
	public function hapus($id='')
	{
    $cek=$this->m_pengeluaran->delete($id);
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
	 	redirect(base_url('admin/pengeluaran'));
	 }
	}

	
}