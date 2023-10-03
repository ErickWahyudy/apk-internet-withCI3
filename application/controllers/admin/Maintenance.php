<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Maintenance extends CI_controller
{
	function __construct()
	{
	 parent:: __construct();
     $this->load->helper('url');
     $this->load->helper('file'); // Load helper file untuk operasi file
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

  //perbaikan_server
  public function index($value='')
  {
        // Mendapatkan pesan yang ingin ditampilkan dari file
    $pesan = read_file(APPPATH . 'config/maintenance_message.txt');

    // Menyimpan pesan ke dalam variabel data
    $data['judul'] = 'Pesan Maintenance';
    $data['pesan'] = $pesan;

     $this->load->view('admin/perbaikan_server/form',$data);
  }


//API Add
public function api_add()
{
    $this->load->helper('file'); // Load helper file untuk operasi file

    // Set aturan validasi
    $this->form_validation->set_rules('pesan', 'Pesan', 'required');

    // Jika validasi gagal
    if ($this->form_validation->run() === FALSE) {
        $data = [
            'status' => 'error',
            'message' => validation_errors(), // Mengambil pesan error validasi
        ];
    } else {
        // Jika validasi berhasil
        // Mendapatkan pesan yang diubah dari input form
        $pesan_baru = $this->input->post('pesan');

        // Menyimpan pesan yang diubah ke dalam file
        if (write_file(APPPATH . 'config/maintenance_message.txt', $pesan_baru)) {
            $data = [
                'status' => 'success',
                'message' => 'Pesan berhasil diubah',
            ];
        } else {
            $data = [
                'status' => 'error',
                'message' => 'Gagal mengubah pesan',
            ];
        }
    }

    echo json_encode($data);
}

}
?>