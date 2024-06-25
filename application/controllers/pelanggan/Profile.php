<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Profile extends CI_controller
{
	function __construct()
	{
	 parent:: __construct();
   $this->load->helper('url');
   // needed ???
   $this->load->database();
   $this->load->library('session');
	 // error_reporting(0);
	 if($this->session->userdata('pelanggan') != TRUE){
    redirect(base_url(''));
     exit;
	};
   $this->load->model('m_pelanggan');
   $this->load->model('m_paket');   
}


  public function index($id='')
  {

  $data=$this->m_pelanggan->view_id_plg($id)->row_array();
  $x = array(
    'aksi'            =>'lihat',
    'judul'           =>'Data Akun Profile',
    'id_paket'        =>$data['id_paket'],
    'paket'           =>$data['paket'],
    'id_pelanggan'    =>$data['id_pelanggan'],
    'nama'            =>$data['nama'],
    'alamat'          =>$data['alamat'],
    'no_hp'           =>$data['no_hp'],
    'terdaftar_mulai' =>$data['terdaftar_mulai'],
    'email'           =>$data['email'],
    'password'        =>$data['password'],
    'id_paket'        =>$data['id_paket'],
    'status_plg'      =>$data['status_plg'],
    'id_maps'         =>$data['id_maps'],
    'latitude'        =>$data['latitude'],
    'longitude'       =>$data['longitude'],
  );
    $this->load->view('pelanggan/pelanggan',$x);
  }

  public function edit($id='') {    
 if (isset($_POST['kirim'])) {     
 if(empty($_FILES['gambar']['name'])){
$SQLupdate=array(
'nama'                =>$this->input->post('nama'),
'alamat'              =>$this->input->post('alamat'),
'no_hp'               =>$this->input->post('no_hp'),
// 'foto'             =>$this->upload->file_name,
'email'               =>$this->input->post('email'),

);

$this->m_pelanggan->update($id,$SQLupdate);
  $pesan='<script>
              swal({
                  title: "Berhasil Edit Data",
                  text: "",
                  type: "success",
                  showConfirmButton: true,
                  confirmButtonText: "OKEE"
                  });
          </script>';

        // Kirim pesan ke Telegram
        date_default_timezone_set('Asia/Jakarta');
				$date = date('d F Y');
				$time = date('H:i:s');
          
        $telegramBotToken = '1306451202:AAFL84nqcQjbAsEpRqVCziQ0VGty4qIAxt4'; // Ganti dengan token bot Telegram Anda
        $telegramChatID = '-1001769208109'; // Ganti dengan chat ID tujuan admin

        $isi_chat = "Ada Pelanggan yang mengupdate data diri:\n";
        $isi_chat .= "Tgl / Waktu: " . $date . " / " . $time . "\n\n";
        $isi_chat .= "ID Pelanggan: " . $id . "\n";
        $isi_chat .= "Nama: " . $this->input->post('nama') . "\n";
        $isi_chat .= "Alamat: " . $this->input->post('alamat') . "\n";
        $isi_chat .= "No HP: " . $this->input->post('no_hp') . "\n";
        $isi_chat .= "Email: " . $this->input->post('email') . "\n";

        // Kirim pesan ke Telegram
        $url = "https://api.telegram.org/bot" . $telegramBotToken . "/sendMessage?chat_id=" . $telegramChatID . "&text=" . urlencode($isi_chat);

        // Pengiriman pesan ke Telegram
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);


          //mengirim email ke pelanggan dengan phpmailer
          require_once(APPPATH.'libraries/phpmailer/Exception.php');
          require_once(APPPATH.'libraries/phpmailer/PHPMailer.php');
          require_once(APPPATH.'libraries/phpmailer/SMTP.php');

          $mail = new PHPMailer();
          // $mail->isSMTP();
          // $mail->Host = 'smtp.gmail.com';
          // $mail->SMTPAuth = true;
          // $mail->Username = 'kassandramikrotik@gmail.com'; // Email gmail anda
          // $mail->Password = 'abzdjiivohwzwieo'; // Password gmail anda
          // $mail->SMTPSecure = 'tls';
          // $mail->Port = 587;
          $mail->setFrom('wifi@kassandra.my.id' , 'Kassandra WiFi'); // Email dan nama pengirim
          $mail->addAddress($this->input->post('email')); // Email tujuan
          $mail->Subject = 'Selamat '.$this->input->post('nama').' Anda berhasil memperbarui data'; // Subject email
          $mail->isHTML(true);
          $content = '</p><table><thead><tr><td style=font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-width:1px;border-style:dashed;border-color:rgb(37,63,89);background:lavender;color:rgb(0,0,0);font-size:16px;padding-left:1em;padding-right:1em>'.
                      '<br>Berhasil memperbarui data pelanggan dengan data sebagai berikut :' .
                          '<br><br>Nama : '.$this->input->post('nama') .
                          '<br>Alamat : '.$this->input->post('alamat') .
                          '<br>No HP : '.$this->input->post('no_hp') .
                          '<br>Paket internet : '.$this->input->post('id_paket') .
                          '<br>Email : '.$this->input->post('email') .
                          '<br>Status : Aktif' .
                          '<br><br><p align=center colspan=2 style=font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif>
                          <a href="https://wifi.kassandra.my.id" style=color:rgb(255,255,255);background-color:#589bf2;border-width:initial;border-style:none;border-radius:15px;padding:10px 20px target=_blank >' .
                          '<b>Login Aplikasi KassandraWiFi</b></a></p>' .
                          '<br></td></tr></thead></table>
                              <table><thead>
                              <tr><td></td></tr>
              <tr>
                              <td style=padding-left:1em;padding-right:1em>
                              <a>
                <img src=https://wifi.kassandra.my.id/themes/kassandra-wifi/img/img/iklan1.jpg width=35%>
                </a>

                <a>
                <img src=https://wifi.kassandra.my.id/themes/kassandra-wifi/img/img/kassandra.jpg width=60%>
                </a>

                <br>

                <a>
                <img src=https://wifi.kassandra.my.id/themes/kassandra-wifi/img/img/iklan3.jpg width=35%>
                </a>

                <a>
                <img src=https://wifi.kassandra.my.id/themes/kassandra-wifi/img/img/payment.png width=60%>
                </a>

              </td>
              </tr>
              </thead></table>
                              <p style=font-size:16px>
              <i>Pesan ini dikirim otomatis oleh system aplikasi KassandraWiFi</i>
              <br><img src="https://wifi.kassandra.my.id/themes/kassandra-wifi/img/img/wifi.png">
              <br><b>~ wifi@kassandra.my.id ~</b></p>' ;
                              
          $mail->Body = $content;
          if ($mail->send())
          ;
        
  	 	$this->session->set_flashdata('pesan',$pesan);
       redirect(base_url('pelanggan/profile'));
   }else{


        $config['upload_path']    = './themes/data/'; 
        $config['allowed_types']  = 'bmp|jpg|png';  
        $config['file_name']      = 'foto_'.time();  
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if($this->upload->do_upload('gambar')){
          
$SQLupdate=array(
'id_pelanggan'        =>$this->input->post('id_pelanggan'),
'nama'                =>$this->input->post('nama'),
'alamat'              =>$this->input->post('alamat'),
'no_hp'               =>$this->input->post('no_hp'),
'foto'                =>$this->upload->file_name,
'email'               =>$this->input->post('email')

);

  $cek=$this->m_pelanggan->update($id,$SQLupdate);
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
  	 	redirect(base_url('pelanggan/profile'));
      }
    }
   }
  }
}

  public function edit_map($id='')
  {

    //validasi id_pelanggan apakah yang login sama dengan id_pelanggan yang di edit
    $id_pelanggan=$this->session->userdata('id_pelanggan');
    if ($id_pelanggan!=$id) {
      $pesan='<script>
                swal({
                    title: "Gagal Edit Data",
                    text: "ID Pelanggan Tidak Ditemukan",
                    type: "error",
                    showConfirmButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "OK",
                    closeOnConfirm: false
                },
                function(){
                    window.location.href="'.base_url('pelanggan/profile').'";
                });
              </script>';
      $this->session->set_flashdata('pesan',$pesan);
      redirect(base_url('pelanggan/profile'));
    }
  	$data=$this->m_pelanggan->view_id_maps($id)->row_array();
    if (empty($data['id_pelanggan'])) {
      $pesan='<script>
                swal({
                    title: "Gagal Edit Data",
                    text: "ID Pelanggan Tidak Ditemukan",
                    type: "error",
                    showConfirmButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "OK",
                    closeOnConfirm: false
                },
                function(){
                    window.location.href="'.base_url('pelanggan/profile').'";
                });
              </script>';
      $this->session->set_flashdata('pesan',$pesan);
   
      redirect(base_url('pelanggan/profile'));
    }

  	$x = array(
    'aksi'            =>'edit_lokasi',
    'judul'           =>'Edit Lokasi Pelanggan',
    'id_pelanggan'    =>$data['id_pelanggan'],
    'id_maps'         =>$data['id_maps'],
    'nama'            =>$data['nama'],
    'alamat'          =>$data['alamat'],
    'latitude'        =>$data['latitude'],
    'longitude'       =>$data['longitude']
  	);

    if (isset($_POST['kirim'])) {   
    $SQLupdate=array(
      'latitude'            =>$this->input->post('latitude'),
      'longitude'           =>$this->input->post('longitude')
      );
      
        $cek=$this->m_pelanggan->update_maps($id=$data['id_maps'],$SQLupdate);
        if($cek){
            $pesan='<script>
                    swal({
                        title: "Berhasil Edit Lokasi Pelanggan",
                        text: "",
                        type: "success",
                        showConfirmButton: true,
                        confirmButtonText: "OKEE"
                        });
                </script>';

                  // Kirim pesan ke Telegram                
                  // Mendapatkan latitude dan longitude dari input
                  $latitude = $this->input->post('latitude');
                  $longitude = $this->input->post('longitude');
                  $nama = $data['nama'];
                  $alamat = $data['alamat'];

                  // Menghasilkan URL gambar peta dari Google Maps Static API
                  $googleMapsApiKey = 'AIzaSyDZe7HOqihPIijMcH43anmVsJTZLcYdg28&callback=initMap';
                  $mapsImageUrl = "https://maps.googleapis.com/maps/api/staticmap?center=" . $latitude . "," . $longitude . "&zoom=15&size=600x300&maptype=roadmap&markers=color:red%7Clabel:L%7C" . $latitude . "," . $longitude . "&key=" . $googleMapsApiKey;

                  // Mendapatkan gambar peta dari URL yang dihasilkan
                  $mapImage = file_get_contents($mapsImageUrl);

                  $isi_chat = "Ada Pelanggan yang mengupdate lokasi:\n";
                  $isi_chat .= "Nama: " . $nama . "\n";
                  $isi_chat .= "Alamat: " . $alamat . "\n";

                  // Konfigurasi pengiriman gambar ke Telegram
                  $telegramBotToken = '1306451202:AAFL84nqcQjbAsEpRqVCziQ0VGty4qIAxt4';
                  $telegramChatID = '-1001769208109';

                  // Mengirimkan gambar ke Telegram
                  $url = "https://api.telegram.org/bot" . $telegramBotToken . "/sendPhoto?chat_id=" . $telegramChatID . "&caption=" . urlencode($isi_chat) . "&parse_mode=Markdown&photo=" . urlencode($mapsImageUrl);

                  // Pengiriman pesan ke Telegram
                  $ch = curl_init();
                  curl_setopt($ch, CURLOPT_URL, $url);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  curl_exec($ch);
                  curl_close($ch);


             $this->session->set_flashdata('pesan',$pesan);
             redirect(base_url('pelanggan/profile/'));
        }else{
          echo "QUERY SQL ERROR";
          }
      }else{
        $this->load->view('pelanggan/pelanggan',$x);
      }
  }

  public function ganti_password($id='') {
  	if (isset($_POST['kirim'])) {
  		$SQLinsert=array(
  			'password'    =>md5($this->input->post('password'))
      );
      $cek=$this->m_pelanggan->update($id,$SQLinsert);
      if($cek){
      	$pesan='<script>
              swal({
                  title: "Berhasil Ganti Password",
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
          $mail->Subject = 'Selamat '.$data['nama'].' Password anda berhasil di ganti'; // Subject email
          $mail->isHTML(true);
          $content = '</p><table><thead><tr><td style=font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-width:1px;border-style:dashed;border-color:rgb(37,63,89);background:lavender;color:rgb(0,0,0);font-size:16px;padding-left:1em;padding-right:1em>'.
                      '<br>Berhasil mengganti password, berikut data akun anda :'.
                          '<br><br>Nama : '.$this->input->post('nama') .
                          '<br>Password : '.$this->input->post('password') .
                          '<br><br><p align=center colspan=2 style=font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif>
                          <a href="https://wifi.kassandra.my.id" style=color:rgb(255,255,255);background-color:#589bf2;border-width:initial;border-style:none;border-radius:15px;padding:10px 20px target=_blank >' .
                          '<b>Login Aplikasi KassandraWiFi</b></a></p>' .
                          '<br></td></tr></thead></table>
                              <table><thead>
                              <tr><td></td></tr>
                              <tr>
                              <td style=padding-left:1em;padding-right:1em>
                              <a>
                              <img src=https://wifi.kassandra.my.id/themes/kassandra-wifi/img/img/iklan1.jpg width=35%>
                              </a>

                              <a>
                              <img src=https://wifi.kassandra.my.id/themes/kassandra-wifi/img/img/kassandra.jpg width=60%>
                              </a>

                              <br>

                              <a>
                              <img src=https://wifi.kassandra.my.id/themes/kassandra-wifi/img/img/iklan3.jpg width=35%>
                              </a>

                              <a>
                              <img src=https://wifi.kassandra.my.id/themes/kassandra-wifi/img/img/payment.png width=60%>
                              </a>

                            </td>
                            </tr>
                            </thead></table>
                                            <p style=font-size:16px>
                            <i>Pesan ini dikirim otomatis oleh system aplikasi KassandraWiFi</i>
                            <br><img src="https://wifi.kassandra.my.id/themes/kassandra-wifi/img/img/wifi.png">
                            <br><b>~ wifi@kassandra.my.id ~</b></p>' ;
                              
          $mail->Body = $content;
          if ($mail->send());
  	 	$this->session->set_flashdata('pesan',$pesan);
        redirect(base_url('pelanggan/profile'));
      }
    }
}

	
}