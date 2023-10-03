<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notfound extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {   
        $view = array('judul'  =>'Not Found');
        $this->load->view('error/error',$view);
    }

    public function dalam_pengembangan()
    {   
        $view = array('judul'  =>'Dalam Pengembangan');
        $this->load->view('error/maintenance',$view);
    }

    public function perbaikan_server()
    {   
        $this->load->helper('file'); // Load helper file untuk operasi file

        // Mendapatkan pesan yang ingin ditampilkan dari file
        $pesan = read_file(APPPATH . 'config/maintenance_message.txt');


        $view = array('judul'  =>'Maintenance Server',
                        'pesan'  => $pesan                    
        );
        $this->load->view('error/perbaikan_server',$view);
    }

}
