<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Tagihan extends CI_controller
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
  $this->load->model('m_pelanggan');
  $this->load->model('m_paket');
  $this->load->model('m_tagihan');
	}

  public function index($value='')
	{
    if (isset($_POST['cari'])) {
     //cek data apabila berhasi Di kirim maka postdata akan melakukan cek .... dan sebaliknya
     $bulan =$this->input->post('bulan');
     $tahun =$this->input->post('tahun');
      $x=array(
      	     'judul'    =>'Data Tagihan Bulanan',
             'data'     =>$this->m_tagihan->data_tagihan($bulan,$tahun),
             'bulan'    =>$bulan,
             'tahun'    =>$tahun,
             'depan'    =>FALSE,
             'cetak'    =>TRUE);
      $this->load->view('admin/tagihan_bulanan/tagihan',$x);
    }else{
	$x = array('judul'    =>'Data Tagihan Bulanan',
             'bulan'    =>$this->db->get('tb_bulan')->result_array(),
             'depan'    =>TRUE,
             'cetak'    =>FALSE);	
    //          $pesan='<div class="alert alert-info alert-dismissible">
    //             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    //             <h4><i class="icon fa fa-check"></i> Berhasil Buka Data Tagihan!</h4>
    //             Bulan.'.$this->input->post('bulan').'-'.$this->input->post('tahun').'
    //           </div>';
    //  $this->session->set_flashdata('pesan',$pesan);
	$this->load->view('admin/tagihan_bulanan/tagihan',$x);
	}
}

  public function buat_tagihan($value='')
  {
    //menampilkan semua data pelanggan untuk membuat tagihan bulanan

    $view=array( 'judul'    =>'Buat Tagihan Bulanan',
                 'data'     =>$this->m_tagihan->pelanggan_view(),
                 'bulan'    =>$this->db->get('tb_bulan')->result_array(),);
    $this->load->view('admin/tagihan_bulanan/tagihan_buat',$view);
            
    if(isset($_POST['kirim'])){;
      $aid      =$this->input->post('id_pelanggan');
      $atarif   =$this->input->post('tarif');

      if(!empty($aid)){
        for ($i=0; $i <count($aid) ; $i++) {
          $iid=$aid[$i];
          $SQLinsert=array( 
              'id_pelanggan'  =>$iid,
              'bulan'         =>$this->input->post('bulan'),
              'tahun'         =>$this->input->post('tahun'),
              'tagihan'       =>$atarif[$i],);
          $cek=$this->m_tagihan->add($SQLinsert);
            
          }
          if($cek){
           $pesan='<script>
              swal({
                  title: "Berhasil Membuat Tagihan Bulanan",
                  text: "",
                  type: "success",
                  showConfirmButton: true,
                  confirmButtonText: "OKEE"
                  });
          </script>';
  	 	    $this->session->set_flashdata('pesan',$pesan);
            redirect(base_url('admin/tagihan'));
          
          }
        }
      }
    }
  
  private function tgl_bayar($value='')
  {
    $tgl        =date('Y-m-d');
    $tgl_bayar  =date('Y-m-d',strtotime($tgl));
    return $tgl_bayar;
  }

  //membuat fungsi update pembayaran secara langsung tanpa view
  public function bayar($id='')
  {
    $SQLupdate=array(
      'status'      =>'LS',
      'tgl_bayar'   =>$this->tgl_bayar());
    $cek=$this->m_tagihan->bayar($id,$SQLupdate);
    if ($cek) {
      $pesan='<script>
              swal({
                  title: "Berhasil Melakukan Pembayaran",
                  text: "",
                  type: "success",
                  showConfirmButton: true,
                  confirmButtonText: "OKEE"
                  });
          </script>';
          //mengirim email ke pelanggan dengan phpmailer
          require_once(APPPATH.'libraries/phpmailer/Exception.php');
          require_once(APPPATH.'libraries/phpmailer/PHPMailer.php');
          require_once(APPPATH.'libraries/phpmailer/SMTP.php');

          $data=$this->db->get_where('tb_tagihan a join tb_pelanggan b on a.id_pelanggan=b.id_pelanggan',array('a.id_tagihan'=>$id))->row_array();

          $mail = new PHPMailer();
          // $mail->isSMTP();
          // $mail->Host = 'smtp.gmail.com';
          // $mail->SMTPAuth = true;
          // $mail->Username = 'kassandramikrotik@gmail.com'; // Email gmail anda
          // $mail->Password = 'abzdjiivohwzwieo'; // Password gmail anda
          // $mail->SMTPSecure = 'tls';
          // $mail->Port = 587;
          $mail->setFrom('wifi@kassandra.my.id' , 'Kassandra WiFi'); // Email dan nama pengirim
          $mail->addAddress($data['email']); // Email dan nama penerima
          $mail->Subject = 'Terima Kasih Sdr/i '.$data['nama']. ' Sudah Melakukan Pembayaran Tagihan KassandraWiFi Untuk Bulan '.$data['bulan'] . ' / Tahun ' .$data['tahun']; // Subject email
          $mail->isHTML(true);
                     $content = '<table><thead><tr>
                        <td style=font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-width:1px;border-style:dashed;border-color:rgb(37,63,89);background:lavender;color:rgb(0,0,0);font-size:16px;padding-left:1em;padding-right:1em>  '.
                        '<p style=font-size:18px>Terima kasih Sdr/i '.$data['nama']. ' Sudah melakukan pembayaran tagihan
                        KassandraWiFi untuk Bulan '.$data['bulan'] . ' / Tahun ' .$data['tahun']. '</p>'.
                        'Dengan rincian Biaya Tagihan : <br><b>Rp. '.number_format($data['tagihan'], 0, ',', '.') . '</b>'.
                        '<br>Tetap nikmati layanan internet 24 jam nonstop tanpa lemot kecuali saat down dari KassandraWiFi.
                        <p align=center colspan=2 style=font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif>
                        <a href="https://wifi.kassandra.my.id/struk/bayar_tagihan/' .$data['id_tagihan']. '" style=color:rgb(255,255,255);background-color:#589bf2;border-width:initial;border-style:none;border-radius:15px;padding:10px 20px target=_blank >' .
                        ' Download Nota</a></p>
                        <br><br></td></tr></thead></table>
                            <p style=font-size:18px;padding-left:1em;padding-right:1em>
                                Bayar lebih mudah melalui merchant KassandraWifi berikut ini :
                                </p>
                                <table><thead>
                            <tr>
                            <td style=padding-left:1em;padding-right:1em>
                                <a>
                                <img src=https://wifi.kassandra.my.id/template/kassandra-wifi/img/img/transferbank.png height=35px>
                                </a>

                                <a>
                                <img src=https://wifi.kassandra.my.id/template/kassandra-wifi/img/img/shopeepay.png height=22px>
                                </a>

                                <a>
                                <img src=https://wifi.kassandra.my.id/template/kassandra-wifi/img/img/linkaja.png height=35px>
                                </a>

                                <a>
                                <img src=https://wifi.kassandra.my.id/template/kassandra-wifi/img/img/dana.png height=35px>
                                </a>

                                <a>
                                <img src=https://wifi.kassandra.my.id/template/kassandra-wifi/img/img/alfamart.png height=35px>
                                </a>

                                <a>
                                <img src=https://wifi.kassandra.my.id/template/kassandra-wifi/img/img/indomaret.png height=35px>
                                </a>
                            </td>
                            </tr>
                            </thead></table><br>

                            <p style=font-size:16px;padding-left:1em;padding-right:1em>
                            <i>Pesan ini dikirim otomatis oleh system aplikasi KassandraWiFi</i>
                            <br><img src=https://wifi.kassandra.my.id/template/kassandra-wifi/img/img/wifi.png>
                            <br><b>~ wifi@kassandra.my.id ~</b></p>'
                        ;
                                
            $mail->Body = $content;
          if ($mail->send());
  	 	$this->session->set_flashdata('pesan',$pesan);
      redirect(base_url('admin/tagihan/lunas'));
    }
  }

  public function editBL($id='')
      {
      $data=$this->m_tagihan->view_id($id)->row_array();
      if (empty($data['id_tagihan'])) {
        $pesan='<script>
                  swal({
                      title: "Gagal Edit Data",
                      text: "ID Tagihan Tidak Ditemukan",
                      type: "error",
                      showConfirmButton: true,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "OK",
                      closeOnConfirm: false
                  },
                  function(){
                      window.location.href="'.base_url('admin/tagihan').'";
                  });
                </script>';
        $this->session->set_flashdata('pesan',$pesan);
        redirect(base_url('admin/tagihan'));
      }

      $x = array('judul'                =>'Edit Data Tagihan Lain' ,
                  'aksi'                =>'editBL',
                  'id_tagihan'          =>$data['id_tagihan'],
                  'id_pelanggan'        =>$data['id_pelanggan'],
                  'nama'                =>$data['nama'],
                  'bulan'               =>$data['bulan'],
                  'tahun'               =>$data['tahun'],
                  'status'              =>$data['status'],
                  'tgl_bayar'           =>$data['tgl_bayar'],
                  'tagihan'             =>$data['tagihan'],
                );	
        if(isset($_POST['kirim'])){
          $SQLupdate=array(
            'status'                    =>$this->input->post('status'),
            'tgl_bayar'                 =>$this->input->post('tgl_bayar'),
            'tagihan'                   =>$this->input->post('tagihan'),
          );
          $cek=$this->m_tagihan->update($id,$SQLupdate);
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
         redirect(base_url('admin/tagihan'));
          }else{
           echo "ERROR input Data";
          }
        }else{
         $this->load->view('admin/tagihan_bulanan/tagihan_form',$x);
        }
      }

    public function lunas($value='')
  { 
    $kode_bulan =date('m');
    $kode_tahun =date('Y');
    $x = array('judul' =>'Data Tagihan',
              'data'  =>$this->m_tagihan->lunas(),
              'sum_tagihanLS'   => $this->db->select_sum('tagihan')->get_where('tb_tagihan',array('status'=>'LS','tahun'=>$kode_tahun,'bulan'=>$kode_bulan))->num_rows() > 0 ? $this->db->select_sum('tagihan')->get_where('tb_tagihan',array('status'=>'LS','tahun'=>$kode_tahun,'bulan'=>$kode_bulan))->row()->tagihan : 0,);
   $this->load->view('admin/tagihan_bulanan/tagihan_lunas',$x);
  }

  public function editLS($id='')
      {
      $data=$this->m_tagihan->view_id($id)->row_array();
      if (empty($data['id_tagihan'])) {
        $pesan='<script>
                  swal({
                      title: "Gagal Edit Data",
                      text: "ID Tagihan Tidak Ditemukan",
                      type: "error",
                      showConfirmButton: true,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "OK",
                      closeOnConfirm: false
                  },
                  function(){
                      window.location.href="'.base_url('admin/tagihan/lunas').'";
                  });
                </script>';
        $this->session->set_flashdata('pesan',$pesan);
        redirect(base_url('admin/tagihan/lunas'));
      }

      $x = array('judul'                =>'Edit Data Tagihan Lain' ,
                  'aksi'                =>'editLS',
                  'id_tagihan'          =>$data['id_tagihan'],
                  'id_pelanggan'        =>$data['id_pelanggan'],
                  'nama'                =>$data['nama'],
                  'bulan'               =>$data['bulan'],
                  'tahun'               =>$data['tahun'],
                  'status'              =>$data['status'],
                  'tgl_bayar'           =>$data['tgl_bayar'],
                  'tagihan'             =>$data['tagihan'],
                );	
        if(isset($_POST['kirim'])){
          $SQLupdate=array(
            'status'                    =>$this->input->post('status'),
            'tgl_bayar'                 =>$this->input->post('tgl_bayar'),
            'tagihan'                   =>$this->input->post('tagihan'),
          );
          $cek=$this->m_tagihan->update($id,$SQLupdate);
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
         redirect(base_url('admin/tagihan/lunas'));
          }else{
           echo "ERROR input Data";
          }
        }else{
         $this->load->view('admin/tagihan_bulanan/tagihan_form',$x);
        }
      }
	
	public function hapus($id='')
	{
    $cek=$this->m_tagihan->delete($id);
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
	 	redirect(base_url('admin/tagihan'));
	 }
	}

  public function konfirmasi($value='')
  {
    $x = array('judul' =>'Data Konfirmasi Pembayaran',
              'data'  =>$this->m_tagihan->konfirmasi_byrView(),
              );
   $this->load->view('admin/tagihan_bulanan/konfirmasi_byr',$x);
  }


	
}