<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Pelanggan extends CI_controller
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
	}

  public function index($value='')
	{
	 $view = array('judul'  =>'Data Pelanggan',
	            'data'      =>$this->m_pelanggan->view(),);
  $this->load->view('admin/pelanggan/pelanggan',$view);
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

  //mengambil id pelanggan urut terakhir
  private function id_pelanggan_urut($value='')
  {
   $this->m_pelanggan->id_urut();
   $query   = $this->db->get();
   $data    = $query->row_array();
   $id      = $data['id_pelanggan'];
   $urut    = substr($id, 1, 3);
   $tambah  = (int) $urut + 1;
   $karakter= $this->acak_id(5);
   
   if (strlen($tambah) == 1){
   $newID = "C"."00".$tambah.$karakter;
      }else if (strlen($tambah) == 2){
      $newID = "C"."0".$tambah.$karakter;
         }else (strlen($tambah) == 3){
         $newID = "C".$tambah.$karakter
           };
    return $newID;
  }

  public function add($value='')
  {
   $x = array(
    'judul'           =>'Tambah Data Pelanggan' , 
    'aksi'            =>'tambah',
    'id_pelanggan'    =>$this->id_pelanggan_urut(),
    'paket'           =>'',
    'nama'            =>'',
    'alamat'          =>'',
    'no_hp'           =>'',
    'terdaftar_mulai' =>'',
    'email'           =>'',
    'password'        =>'',
    'level'           =>'PLG',
    'status_plg'      =>'Aktif',
    'id_maps'         =>$this->acak_id(15),
  );
    
   if (isset($_POST['kirim'])) {

    //cek nomor hp sudah pernah terdaftar
    $proses_cek=$this->db->get_where('tb_pelanggan',array('no_hp'=>$this->input->post('no_hp')))->num_rows();
    if ($proses_cek > 0) {
        $this->session->set_flashdata('pesan', '<script>
            swal({
                text: "Nomor HP sudah pernah digunakan mendaftar, silakan menggunakan nomor HP yang lain",
                type: "error",
                showConfirmButton: true,
                confirmButtonText: "OKEE"
            });
        </script>');
        redirect('admin/pelanggan');
    }
    else
    //cek email sudah pernah terdaftar
    $proses_cek=$this->db->get_where('tb_pelanggan',array('email'=>$this->input->post('email')))->num_rows();
    if ($proses_cek > 0) {
        $this->session->set_flashdata('pesan', '<script>
            swal({
                text: "Email sudah pernah digunakan mendaftar, silakan menggunakan email yang lain",
                type: "error",
                showConfirmButton: true,
                confirmButtonText: "OKEE"
            });
        </script>');
        redirect('admin/pelanggan');
    }
    else
      
      // $config['upload_path'] = './themes/data/'; 
      // $config['allowed_types'] = 'bmp|jpg|png';  
      // $config['file_name'] = 'foto_'.time();  
      // $this->load->library('upload', $config);
      // $this->upload->initialize($config);
      // if($this->upload->do_upload('gambar')){
        
$SQLinsert=array(
'id_pelanggan'      =>$this->id_pelanggan_urut(),
'nama'              =>$this->input->post('nama'),
'alamat'            =>$this->input->post('alamat'),
// 'foto'           =>$this->upload->file_name,
'no_hp'             =>$this->input->post('no_hp'),
'terdaftar_mulai'   =>$this->input->post('terdaftar_mulai'),
'email'             =>$this->input->post('email'),
'password'          =>md5($this->input->post('password')),
'id_paket'          =>$this->input->post('id_paket'),
'id_maps'           =>$x['id_maps']
);

$SQLinsert2=array(
  'id_maps'         =>$x['id_maps'],
);

$cek=$this->m_pelanggan->add($SQLinsert);
$cek=$this->m_pelanggan->addMaps($SQLinsert2);
if($cek){
  	$pesan='<script>
              swal({
                  title: "Berhasil Menambahkan Data Pelanggan",
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
            $mail->addAddress($this->input->post('email')); // Email tujuan
            $mail->Subject = 'Selamat '.$this->input->post('nama').' Anda berhasil mendaftar';
            $mail->isHTML(true);
            $content = '</p><table><thead><tr><td style=font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-width:1px;border-style:dashed;border-color:rgb(37,63,89);background:lavender;color:rgb(0,0,0);font-size:16px;padding-left:1em;padding-right:1em>'.
                        '<br>Pemasangan baru wifi akan dilakukan secepatnya 1 sampai 3 hari setelah proses pendaftaran. 
              <br>Kami memberikan layanan hotspot wifi unlimited 24 jam non stop tanpa lemot kecuali saat wifi down.
              <br>Gunakan Aplikasi KassandraWiFi untuk selalu memantau tagihan anda dan juga melihat informasi terupdate dari admin.' .
                            '<br><br>Berikut kami sampaikan mengenai informasi data anda :' .
                            '<br><br>Nama : '.$this->input->post('nama') .
                            '<br>Alamat : '.$this->input->post('alamat') .
                            '<br>No HP : '.$this->input->post('no_hp') .
                            '<br>Paket internet : '.$this->input->post('id_paket') .
                            '<br>Email : '.$this->input->post('email') .
                            '<br>Password : '.$this->input->post('password') .
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
	 	redirect(base_url('admin/pelanggan'));
    }
   }
 
  }

  public function edit($id='')
  {
  $data=$this->m_pelanggan->view_id($id)->row_array();
  
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
                  window.location.href="'.base_url('admin/pelanggan').'";
              });
            </script>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/pelanggan'));
  }

  $x = array(
    'aksi'            =>'edit',
    'judul'           =>'Edit Data Pelanggan',
    'paket'           =>$this->db->get('tb_paket')->result_array(),
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
    
 if (isset($_POST['kirim'])) {     
 if(empty($_FILES['gambar']['name'])){
$SQLupdate=array(
'id_pelanggan'        =>$this->input->post('id_pelanggan'),
'nama'                =>$this->input->post('nama'),
'alamat'              =>$this->input->post('alamat'),
'no_hp'               =>$this->input->post('no_hp'),
// 'foto'             =>$this->upload->file_name,
'terdaftar_mulai'     =>$this->input->post('terdaftar_mulai'),
'email'               =>$this->input->post('email'),
'id_paket'            =>$this->input->post('id_paket'),
'status_plg'          =>$this->input->post('status_plg')

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
          if ($mail->send());
  	 	$this->session->set_flashdata('pesan',$pesan);
       redirect(base_url('admin/pelanggan'));
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
'terdaftar_mulai'     =>$this->input->post('terdaftar_mulai'),
'email'               =>$this->input->post('email'),
'id_paket'            =>$this->input->post('id_paket')
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
  	 	redirect(base_url('admin/pelanggan'));
  }else{
   echo "QUERY SQL ERROR";
  }


        }else{
        	echo $this->upload->display_errors();
        }
       }
      }else{
      	$this->load->view('admin/pelanggan/pelanggan_form',$x);
      }
  }

public function edit_map($id='')
  {
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
                    window.location.href="'.base_url('admin/pelanggan').'";
                });
              </script>';
      $this->session->set_flashdata('pesan',$pesan);
      redirect(base_url('admin/pelanggan'));
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
             $this->session->set_flashdata('pesan',$pesan);
             redirect(base_url('admin/pelanggan/edit/'.$data['id_pelanggan']));
        }else{
          echo "QUERY SQL ERROR";
          }
      }else{
        $this->load->view('admin/pelanggan/pelanggan_form',$x);
      }
  }

public function ganti_password($id='') 
  {
  	$data=$this->m_pelanggan->view_id($id)->row_array();
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
                    window.location.href="'.base_url('admin/pelanggan').'";
                });
              </script>';
      $this->session->set_flashdata('pesan',$pesan);
      redirect(base_url('admin/pelanggan'));
    }

  	$x = array(
    'aksi'            =>'ganti_pswd',
    'judul'           =>'Ganti Password Pelanggan',
    'id_pelanggan'    =>$data['id_pelanggan'],
    'nama'            =>$data['nama'],
    'email'           =>$data['email'],
    'password'        =>$data['password'],
  );
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
        redirect(base_url('admin/pelanggan/edit/'.$id.''));
      }else{
        echo $this->upload->display_errors();
     }
    }else{
      $this->load->view('admin/pelanggan/pelanggan_form',$x);
    }
}
   

  public function hapus($id='')
  {

    $cek=$this->m_pelanggan->delete($id);
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
	 	redirect(base_url('admin/pelanggan'));
	 }
  } 
  
	
}