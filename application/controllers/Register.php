<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Register extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // needed ???
        $this->load->database();
        $this->load->library('session');
        // error_reporting(0);
        $this->load->model('M_pelanggan');
        $this->load->model('M_paket');
        $this->load->model('M_promo');
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
    $this->M_pelanggan->id_urut();
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

    private function tanggal()
    {
        $tanggal = date('Y-m-d');
        return $tanggal;
    }

    public function add()
    {
        $x = array(
            'judul'           =>'Register' , 
            'aksi'            =>'register',
            'id_pelanggan'    =>$this->id_pelanggan_urut(),
            'paket'           =>$this->db->get('tb_paket',10,1)->result_array(),
            'nama'            =>'',
            'alamat'          =>'',
            'no_hp'           =>'',
            'terdaftar_mulai' =>$this->tanggal(),
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
                redirect('register');
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
                redirect('register');
            }
            else


            $SQLinsert=array(
                'id_pelanggan'      =>$this->id_pelanggan_urut(),
                'nama'              =>$this->input->post('nama'),
                'alamat'            =>$this->input->post('alamat'),
                // 'foto'           =>$this->upload->file_name,
                'no_hp'             =>$this->input->post('no_hp'),
                'terdaftar_mulai'   =>$this->tanggal(),
                'email'             =>$this->input->post('email'),
                'password'          =>md5($this->input->post('password')),
                'id_paket'          =>$this->input->post('id_paket'),
                'id_maps'           =>$x['id_maps']
                );

        $cek=$this->M_pelanggan->add($SQLinsert);

        $SQLinsert3=array(
            'id_maps'         =>$x['id_maps'],
          );
        $cek2=$this->M_pelanggan->addMaps($SQLinsert3);
        if ($cek) {

            //Membuat Notifikasi Menggunakan Sweetalert
            $this->session->set_flashdata('pesan', '<script>
                swal({
                    title: "Berhasil",
                    text: "Selamat Anda berhasil mendaftar, untuk pemasangan baru silakan tunggu proses dari kami sekitar 1 - 3 hari",
                    type: "success",
                    showConfirmButton: true,
                    confirmButtonText: "OKEE"
                });
            </script>');
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
                <img src=https://wifi.kassandra.my.id/template/kassandra-wifi/img/img/iklan1.jpg width=35%>
                </a>

                <a>
                <img src=https://wifi.kassandra.my.id/template/kassandra-wifi/img/img/kassandra.jpg width=60%>
                </a>

                <br>

                <a>
                <img src=https://wifi.kassandra.my.id/template/kassandra-wifi/img/img/iklan3.jpg width=35%>
                </a>

                <a>
                <img src=https://wifi.kassandra.my.id/template/kassandra-wifi/img/img/payment.png width=60%>
                </a>

                </td>
                </tr>
                </thead></table>
                                <p style=font-size:16px>
                <i>Pesan ini dikirim otomatis oleh system aplikasi KassandraWiFi</i>
                <br><img src="https://wifi.kassandra.my.id/template/kassandra-wifi/img/img/wifi.png">
                <br><b>~ wifi@kassandra.my.id ~</b></p>' ;
                                
                $mail->Body = $content;
                if ($mail->send())
                ;
            redirect('register');
        }else{
            //Membuat Notifikasi Menggunakan Sweetalert
            $this->session->set_flashdata('pesan', '<script>
                swal({
                    title: "Gagal",
                    text: "Data Gagal Disimpan, silakan hubungi admin",
                    type: "error",
                    timer: 2000,
                    showConfirmButton: true,,
                    confirmButtonText: "OKEE"
                });
            </script>');
            redirect('register');
        }
    }
    $this->load->view('landingpage/register',$x);
}


    //mengambil id pelanggan urut terakhir
    private function id_promo_urut($value='')
    {
    $this->M_promo->promo_id_urut();
    $query   = $this->db->get();
    $data    = $query->row_array();
    $id      = $data['id_promo'];
    $urut    = substr($id, 1, 3);
    $tambah  = (int) $urut + 1;
    $karakter= $this->acak_id(5);
    
    if (strlen($tambah) == 1){
    $newID = "Z"."00".$tambah.$karakter;
        }else if (strlen($tambah) == 2){
        $newID = "Z"."0".$tambah.$karakter;
            }else (strlen($tambah) == 3){
            $newID = "Z".$tambah.$karakter
            };
        return $newID;
    }


        //mengompres ukuran gambar
        private function compress($source, $destination, $quality) 
        {
            $info = getimagesize($source);
            if ($info['mime'] == 'image/jpeg') 
                $image = imagecreatefromjpeg($source);
            elseif ($info['mime'] == 'image/gif') 
                $image = imagecreatefromgif($source);
            elseif ($info['mime'] == 'image/png') 
                $image = imagecreatefrompng($source);
            imagejpeg($image, $destination, $quality);
            return $destination;
        }
    
        //menyimpan gambar bukti_ktp ke dalam folder
        //upload file ke server
        private function upload_bukti_ktp($value='')
        {
            $ekstensi_diperbolehkan = array('png','jpg','jpeg');
            $nama = $_FILES['bukti_ktp']['name'];
            $x = explode('.', $nama);
            $ekstensi = strtolower(end($x));
            $ukuran = $_FILES['bukti_ktp']['size'];
            $file_tmp = $_FILES['bukti_ktp']['tmp_name'];
            $folderPath = "./template/bukti_ktp/";
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 10044070){      
                    $fileName = $this->input->post('nama').'_'.uniqid() . '.' . $ekstensi;
                    $file = $folderPath . $fileName;
                    move_uploaded_file($file_tmp, $file);
                    $this->compress($file, $file, 40);
                    return $fileName;
                }else{
                    $this->session->set_flashdata('pesan', '<script>
                        swal({
                            title: "Gagal",
                            text: "Ukuran File Terlalu Besar",
                            type: "error",
                            timer: 2000,
                            showConfirmButton: true,,
                            confirmButtonText: "OKEE"
                        });
                    </script>');
                    redirect('promo');
                }
            }else{
                $this->session->set_flashdata('pesan', '<script>
                    swal({
                        title: "Gagal",
                        text: "Ekstensi File Tidak Diperbolehkan",
                        type: "error",
                        timer: 2000,
                        showConfirmButton: true,,
                        confirmButtonText: "OKEE"
                    });
                </script>');
                redirect('promo');
            }
        }
            
    

    //menyimpan tanda tangan digital ke dalam folder
    private function upload_signature($value='')
    {
        $folderPath = "./template/signature/";
        if(empty($this->input->post('signed'))){
            return "default.jpg";
        }else{
            $image_parts = explode(";base64,", $this->input->post('signed'));
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = $this->input->post('nama').'_'.uniqid() . '.' . $image_type;
            $file = $folderPath . $fileName;
            file_put_contents($file, $image_base64);
            return $fileName;
        }
    }

    public function promo()
    {
        $x = array(
            'judul'           =>'Promo KassandraWiFi' , 
            'aksi'            =>'promo',
            'id_promo'        =>$this->id_promo_urut(),
            'id_pelanggan'    =>$this->id_pelanggan_urut(),
            'paket'           =>$this->db->get('tb_paket',10,1)->result_array(),
            'nama'            =>'',
            'alamat'          =>'',
            'no_hp'           =>'',
            'terdaftar_mulai' =>$this->tanggal(),
            'email'           =>'',
            'password'        =>'',
            'tgl_daftar'      =>$this->tanggal(),
            'signature'       =>'',
            'bukti_ktp'       =>'',
            'biaya_promo'     =>$this->db->get('tb_promo',1)->result_array(),
            'status'          =>$this->db->get('tb_promo',1)->result_array(),
            'level'           =>'PLG',
            'status_plg'        =>'Aktif',
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
                redirect('promo');
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
                redirect('promo');
            }
            else

            $SQLinsert=array(
                'id_pelanggan'      =>$this->id_pelanggan_urut(),
                'nama'              =>$this->input->post('nama'),
                'alamat'            =>$this->input->post('alamat'),
                // 'foto'           =>$this->upload->file_name,
                'no_hp'             =>$this->input->post('no_hp'),
                'terdaftar_mulai'   =>$this->tanggal(),
                'email'             =>$this->input->post('email'),
                'password'          =>md5($this->input->post('password')),
                'id_paket'          =>$this->input->post('id_paket'),
                'id_maps'           =>$x['id_maps'],
                );
        $cek=$this->M_pelanggan->add($SQLinsert);

            $SQLinsert2=array(
                'id_promo'          =>$this->id_promo_urut(),
                'id_pelanggan'      =>$this->id_pelanggan_urut(),
                'tgl_daftar'        =>$this->tanggal(),
                'bukti_ktp'         =>$this->upload_bukti_ktp(),
                'signature'         =>$this->upload_signature(),
                );
        $cek=$this->M_promo->promo_add($SQLinsert2);

        $SQLinsert3=array(
            'id_maps'         =>$x['id_maps'],
          );
        $cek=$this->M_pelanggan->addMaps($SQLinsert3);
        
        if ($cek) {

            $pesan='<script>
              swal({
                  title: "Berhasil",
                  text: "Selamat Anda berhasil mendaftar, untuk pemasangan baru silakan tunggu proses dari kami sekitar 1 - 3 hari",
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
                        <img src=https://wifi.kassandra.my.id/template/kassandra-wifi/img/img/iklan1.jpg width=35%>
                        </a>

                        <a>
                        <img src=https://wifi.kassandra.my.id/template/kassandra-wifi/img/img/kassandra.jpg width=60%>
                        </a>

                        <br>

                        <a>
                        <img src=https://wifi.kassandra.my.id/template/kassandra-wifi/img/img/iklan3.jpg width=35%>
                        </a>

                        <a>
                        <img src=https://wifi.kassandra.my.id/template/kassandra-wifi/img/img/payment.png width=60%>
                        </a>

                        </td>
                        </tr>
                        </thead></table>
                                        <p style=font-size:16px>
                        <i>Pesan ini dikirim otomatis oleh system aplikasi KassandraWiFi</i>
                        <br><img src="https://wifi.kassandra.my.id/template/kassandra-wifi/img/img/wifi.png">
                        <br><b>~ wifi@kassandra.my.id ~</b></p>' ;
                                        
                        $mail->Body = $content;
                        if ($mail->send())
                        ;

            //Membuat Notifikasi Menggunakan Sweetalert
            $this->session->set_flashdata('pesan', $pesan);
            redirect('promo');
        }else{

            $pesan='<script>
              swal({
                  title: "Gagal",
                  text: "Maaf Anda gagal mendaftar, silakan hubungi admin",
                  type: "error",
                  showConfirmButton: true,
                  confirmButtonText: "OKEE"
                  });
                    </script>';
            //Membuat Notifikasi Menggunakan Sweetalert
            $this->session->set_flashdata('pesan', $pesan);
            redirect('promo');
        }
    }
    $this->load->view('landingpage/promo',$x);
    }

    // membuat nomor antrian otomatis dengan format ANTRIAN-0001 reset tiap hari berdasarkan tanggal yang diinput
    private function id_antrian_urut($value='')
    {
        $this->db->select('RIGHT(tb_antrian.id_antrian,4) as kode', FALSE);
        $this->db->order_by('id_antrian','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tb_antrian');      //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
           //jika kode ternyata sudah ada.      
           $data = $query->row();      
           $kode = intval($data->kode) + 1;    
        }
        else{      
           //jika kode belum ada      
           $kode = 1;    
        }
        $tanggal=date('dmy');
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = "ANTRIAN-".$tanggal.$kodemax;    // hasilnya ANTRIAN-02012023-0001 dst.
        return $kodejadi;
    }
    
}
