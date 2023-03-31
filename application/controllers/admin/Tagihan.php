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
      $this->load->library('form_validation');
      
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
  }

  //API buat tagihan bulanan
  public function api_add($value='')
  {
    $rules = array(
      array(
        'field' => 'id_pelanggan[]',
        'label' => 'id_pelanggan',
        'rules' => 'required'
      ),
      array(
        'field' => 'tarif[]',
        'label' => 'tarif',
        'rules' => 'required'
      ),
      array(
        'field' => 'bulan',
        'label' => 'bulan',
        'rules' => 'required'
      ),
      array(
        'field' => 'tahun',
        'label' => 'tahun',
        'rules' => 'required'
      ),
    );
    $this->form_validation->set_rules($rules);
    if ($this->form_validation->run() == FALSE) {
      $pesan=array(
        'status'  =>FALSE,
        'pesan'   =>'Tidak ada data yang di kirim');
      echo json_encode($pesan);
    }else{
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
           $pesan=array(
            'status'  =>TRUE,
            'pesan'   =>'Berhasil Membuat Tagihan Bulanan');
          echo json_encode($pesan);
          }
        }
      }
    }
  

  //API bayar tagihan
  public function api_bayar($id='') {
    if(empty($id)){
      $response = [
        'status' => false,
        'message' => 'Tidak ada data yang dipilih'
      ];
    }else{
      $SQLupdate=array(
        'status'                    =>'LS',
        'tgl_bayar'                 =>date('Y-m-d'),
      );
      $cek=$this->m_tagihan->bayar($id,$SQLupdate);
      if($cek){
        $response = [
          'status' => true,
          'message' => 'Berhasil Bayar Tagihan'
        ];
        //mengirim email ke pelanggan dengan phpmailer
        require_once(APPPATH.'libraries/phpmailer/Exception.php');
        require_once(APPPATH.'libraries/phpmailer/PHPMailer.php');
        require_once(APPPATH.'libraries/phpmailer/SMTP.php');

        $data=$this->db->query("SELECT * FROM tb_pelanggan JOIN tb_tagihan ON tb_pelanggan.id_pelanggan=tb_tagihan.id_pelanggan JOIN tb_bulan ON tb_tagihan.bulan=tb_bulan.id_bulan WHERE tb_tagihan.id_tagihan='$id'");
        $data=$data->row_array();

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
                              <img src=https://wifi.kassandra.my.id/themes/kassandra-wifi/img/img/transferbank.png height=35px>
                              </a>

                              <a>
                              <img src=https://wifi.kassandra.my.id/themes/kassandra-wifi/img/img/shopeepay.png height=22px>
                              </a>

                              <a>
                              <img src=https://wifi.kassandra.my.id/themes/kassandra-wifi/img/img/linkaja.png height=35px>
                              </a>

                              <a>
                              <img src=https://wifi.kassandra.my.id/themes/kassandra-wifi/img/img/dana.png height=35px>
                              </a>

                              <a>
                              <img src=https://wifi.kassandra.my.id/themes/kassandra-wifi/img/img/alfamart.png height=35px>
                              </a>

                              <a>
                              <img src=https://wifi.kassandra.my.id/themes/kassandra-wifi/img/img/indomaret.png height=35px>
                              </a>
                          </td>
                          </tr>
                          </thead></table><br>

                          <p style=font-size:16px;padding-left:1em;padding-right:1em>
                          <i>Pesan ini dikirim otomatis oleh system aplikasi KassandraWiFi</i>
                          <br><img src=https://wifi.kassandra.my.id/themes/kassandra-wifi/img/img/wifi.png>
                          <br><b>~ wifi@kassandra.my.id ~</b></p>'
                      ;
                              
          $mail->Body = $content;
        if ($mail->send());
      }else{
        $response = [
          'status' => false,
          'message' => 'Gagal Bayar Tagihan'
        ];
      }
    }
    echo json_encode($response);
  }

    //API edit tagihan BL
    public function api_editBL($id='') {
      $rules = [
        [
          'field' => 'status',
          'label' => 'Status',
          'rules' => 'required'
        ],
        [
          'field' => 'tagihan',
          'label' => 'Tagihan',
          'rules' => 'required'
        ],
      ];
      $this->form_validation->set_rules($rules);
      if ($this->form_validation->run() == FALSE) {
        $response = [
          'status' => false,
          'message' => 'Tidak ada data yang dipilih'
        ];
      }else{
        $SQLupdate=array(
          'status'                    =>$this->input->post('status'),
          'tagihan'                   =>$this->input->post('tagihan'),
        );
        $cek=$this->m_tagihan->update($id,$SQLupdate);
        if($cek){
          $response = [
            'status' => true,
            'message' => 'Berhasil Edit Data'
          ];
        }else{
          $response = [
            'status' => false,
            'message' => 'Gagal Edit Data'
          ];
        }
      }
      echo json_encode($response);
    }


    public function lunas($dari='',$sampai='')
  { 
    $kode_bulan =date('m');

    if (isset($_POST['cari'])) {
      //cek data apabila berhasi Di kirim maka postdata akan melakukan cek .... dan sebaliknya
      $dari=$this->input->post('dari');
      $sampai=$this->input->post('sampai');
      
    $x = array('judul' =>'Data Lunas Tagihan',
              'data'  =>$this->m_tagihan->lunas($dari,$sampai),
              'dari'  =>$dari,
              'sampai'=>$sampai,
              'depan'=>FALSE,
              'cetak'=>TRUE,
              'sum_tagihanLS'   => $this->db->select_sum('tagihan')->get_where('tb_tagihan',array('status'=>'LS','tahun'=>$dari,'bulan'=>$kode_bulan))->num_rows() > 0 ? $this->db->select_sum('tagihan')->get_where('tb_tagihan',array('status'=>'LS','tahun'=>$dari,'bulan'=>$kode_bulan))->row()->tagihan : 0,);
   $this->load->view('admin/tagihan_bulanan/tagihan_lunas',$x);
  }else{
    $x = array('judul'    =>'Data Lunas Tagihan',
               'depan'    =>TRUE,
               'cetak'    =>FALSE);	
    $this->load->view('admin/tagihan_bulanan/tagihan_lunas',$x);
  }
}

  public function editLS($id='') {
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
          }
        }
      }

      //API edit tagihan BL
    public function api_editLS($id='') {
      $rules = [
        [
          'field' => 'tgl_bayar',
          'label' => 'Tanggal bayar',
          'rules' => 'required'
        ],
      ];
      $this->form_validation->set_rules($rules);
      if ($this->form_validation->run() == FALSE) {
        $response = [
          'status' => false,
          'message' => 'Tidak ada data yang dipilih'
        ];
      }else{
        $SQLupdate=array(
          'tgl_bayar'                 =>$this->input->post('tgl_bayar'),
        );
        $cek=$this->m_tagihan->update($id,$SQLupdate);
        if($cek){
          $response = [
            'status' => true,
            'message' => 'Berhasil Edit Data'
          ];
        }else{
          $response = [
            'status' => false,
            'message' => 'Gagal Edit Data'
          ];
        }
      }
      echo json_encode($response);
    }
	
	//API hapus tagihan
  public function api_hapus($id='')
  {
    if(empty($id)){
      $response = [
        'status' => false,
        'message' => 'Data kosong'
      ];
    }else{
      if ($this->m_tagihan->delete($id)) {
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

  public function konfirmasi($value='')
  {
    $x = array('judul' =>'Data Konfirmasi Pembayaran',
              'data'  =>$this->m_tagihan->konfirmasi_byrView(),
              );
   $this->load->view('admin/tagihan_bulanan/konfirmasi_byr',$x);
  }


	
}