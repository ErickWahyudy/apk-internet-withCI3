<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Laporan extends CI_controller
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
	 $this->load->model('M_admin');
   $this->load->model('M_pelanggan');
   $this->load->model('M_promo');
   $this->load->model('M_paket');
   $this->load->model('M_tagihan');
   $this->load->model('M_tagihan_lain');
   $this->load->model('M_pengeluaran');
   $this->load->model('M_feedback');
    $this->load->model('M_informasi');
	}

	public function index()
    {
        $current_year = date('Y');
        $years_range = range($current_year - 4, $current_year);  // Sesuaikan jika diperlukan

        // Urutkan tahun dari yang terbaru ke yang terlama
        rsort($years_range);

        $data = array();

        foreach ($years_range as $year) {
            $tagihanLS = $this->db->select_sum('tagihan')->get_where('tb_tagihan', array('status' => 'LS', 'tahun' => $year))->row()->tagihan;
            $pengeluaran = $this->db->select_sum('biaya_pengeluaran')->get_where('tb_pengeluaran', array('keterangan' => 'LUNAS', 'YEAR(tanggal)' => $year))->row()->biaya_pengeluaran;

            $data[$year] = array(
                'sum_tagihanLS' => $tagihanLS,
                'pengeluaran' => $pengeluaran,
            );
        }

        $view = array(
            'judul' => 'Laporan Keuangan',
            'years_range' => $years_range,
            'data' => $data,
        );

        $this->load->view('admin/laporan/form', $view);
    }



	
}