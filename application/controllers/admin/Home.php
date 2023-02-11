<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Home extends CI_controller
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
    $kode_tahun = date('Y');
	 $view = array(
        'judul'           =>'Halaman Administrator',
        'count_plg'       => $this->db->get_where('tb_pelanggan',array('status_plg'=>'Aktif'))->num_rows(),
        'count_paket'     => $this->db->get('tb_paket')->num_rows(),
        'count_tagihanBL' => $this->db->get_where('tb_tagihan',array('status'=>'BL'))->num_rows(),
        'count_tagihanLS' => $this->db->get_where('tb_tagihan',array('status'=>'LS'))->num_rows(),
        'sum_tagihanLS'   => $this->db->select_sum('tagihan')->get_where('tb_tagihan',array('status'=>'LS','tahun'=>$kode_tahun))->num_rows() > 0 ? $this->db->select_sum('tagihan')->get_where('tb_tagihan',array('status'=>'LS','tahun'=>$kode_tahun))->row()->tagihan : 0,
        'pengeluaran'     => $this->db->select_sum('biaya_pengeluaran')->get_where('tb_pengeluaran',array('keterangan'=>'LUNAS','YEAR(tanggal)'=>date('Y')))->num_rows() > 0 ? $this->db->select_sum('biaya_pengeluaran')->get_where('tb_pengeluaran',array('keterangan'=>'LUNAS','YEAR(tanggal)'=>date('Y')))->row()->biaya_pengeluaran : 0,

     );
	 $this->load->view('admin/home',$view);
	}

public function keluar($value='')
{

$this->session->sess_destroy();
echo "<script>alert('Anda Telah Keluar Dari Halaman Administrator')</script>";;
redirect(base_url(''));
}

	
}