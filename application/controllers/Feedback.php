<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Feedback extends CI_controller
{
	function __construct()
	{
	 parent:: __construct();
   $this->load->helper('url');
   // needed ???
   $this->load->database();
   $this->load->library('session');

    $this->load->model('m_feedback');
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
      $query    = $this->db->get();
      $data     = $query->row_array();
      $id       = $data['id_feedback'];
      $urut     = substr($id, 1, 3);
      $tambah   = (int) $urut + 1;
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
    
     public function feedback_add($value='')
     {
      $x = array(
       'judul'              =>'Feedback Pelanggan' , 
       'aksi'               =>'Tambah',
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
                      title: "Berhasil Mengirim Data",
                      text: "",
                      type: "success",
                      showConfirmButton: true,
                      confirmButtonText: "OKEE"
                      });
              </script>';
        $this->session->set_flashdata('pesan',$pesan);
        redirect(base_url('feedback'));
    }else{
    echo "QUERY SQL ERROR";
    }   
    
       }else{
         $this->load->view('landingpage/feedback',$x);
       }
    
     }
    

}
  