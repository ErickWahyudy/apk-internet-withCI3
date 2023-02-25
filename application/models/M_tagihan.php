<?php 

/**
* 
*/
class M_tagihan extends CI_model
{

    private $table1 = 'tb_pelanggan';
    private $table2 = 'tb_paket';
    private $table3 = 'tb_tagihan';
    private $tb_bulan = 'tb_bulan';
    private $konfirmasi = 'tb_tagihan_konfirmasi';

public function view_id($id='')
{
    $this->db->select('*');
    $this->db->from($this->table3);
    $this->db->join($this->table1 , 'tb_tagihan.id_pelanggan = tb_pelanggan.id_pelanggan');
    $this->db->join($this->table2 , 'tb_pelanggan.id_paket = tb_paket.id_paket');
    $this->db->where('id_tagihan', $id);
    return $this->db->get();
}

public function add($SQLinsert){
    return $this -> db -> insert($this->table3, $SQLinsert);
}

public function update($id='',$SQLupdate){
    $this->db->where('id_tagihan', $id);
    return $this->db-> update($this->table3, $SQLupdate);
}

public function data_tagihan($bulan='',$tahun='')
{
  $this->db->select('*');
  $this->db->from($this->table3);
  $this->db->join($this->table1 , 'tb_tagihan.id_pelanggan = tb_pelanggan.id_pelanggan');
  $this->db->join($this->table2 , 'tb_pelanggan.id_paket = tb_paket.id_paket');
  $this->db->where('bulan', $bulan);
  $this->db->where('tahun', $tahun);
  $this->db->where('status', 'BL');
  $this->db->order_by('id_tagihan');
  return $this->db->get();
}

public function sendmail_bl($bulan='',$tahun='')
{
  $this->db->select('*');
  $this->db->from($this->table3);
  $this->db->join($this->table1 , 'tb_tagihan.id_pelanggan = tb_pelanggan.id_pelanggan');
  $this->db->join($this->table2 , 'tb_pelanggan.id_paket = tb_paket.id_paket');
  $this->db->where('status', 'BL');
  $this->db->order_by('id_tagihan');
  return $this->db->get();
} 

public function lunas($dari='', $sampai='')
{
    //join table tb_pelanggan dan tb_tagihan
    $this->db->select('*');
    $this->db->from($this->table3);
    $this->db->join($this->table1 , 'tb_tagihan.id_pelanggan = tb_pelanggan.id_pelanggan');
    $this->db->where('tahun >=', $dari);
    $this->db->where('tahun <=', $sampai);
    $this->db->where('status', 'LS');
    $this->db->order_by('tgl_bayar', 'DESC');
    return $this->db->get();
}

public function konfirmasi_byrView($value='')
{
    //join table tb_pelanggan dan tb_tagihan dan tb_tagihan_konfirmasi
    $this->db->select('*');
    $this->db->from($this->konfirmasi);
    $this->db->join($this->table1 , 'tb_tagihan_konfirmasi.id_pelanggan = tb_pelanggan.id_pelanggan');
    $this->db->join($this->table3 , 'tb_tagihan_konfirmasi.id_tagihan = tb_tagihan.id_tagihan');
    $this->db->order_by('tgl_konfirmasi', 'DESC');
    return $this->db->get();
}

public function bayar($id='',$SQLupdate){
  $this->db->where('id_tagihan', $id);
  return $this->db-> update($this->table3, $SQLupdate);
}

public function delete($id=''){
  $this->db->where('id_tagihan', $id);
  return $this->db-> delete($this->table3);
}

public function pelanggan_view($value='')
{
    //join table tb_pelanggan dan tb_paket
    $this->db->select('*');
    $this->db->from($this->table1);
    $this->db->join($this->table2 , 'tb_pelanggan.id_paket = tb_paket.id_paket');
    $this->db->where('status_plg', 'Aktif');
    $this->db->order_by('id_pelanggan');
    return $this->db->get();
}

//untuk page pelanggan
public function tagihan($id='')
{
    //buka data tagihan berdasarkan id
    $id = $this->session->userdata['id_pelanggan'];
    $this->db->select('*');
    $this->db->from($this->table3);
    $this->db->where('id_pelanggan', $id);
    $this->db->order_by('status', 'BL');
    $this->db->order_by('id_tagihan', 'Desc');
    return $this->db->get();
}

public function home_tagihan($id='')
{
    //buka data tagihan berdasarkan id
    $id = $this->session->userdata['id_pelanggan'];
    $this->db->select('*');
    $this->db->from($this->table3);
    $this->db->join($this->table1 , 'tb_tagihan.id_pelanggan = tb_pelanggan.id_pelanggan');
    $this->db->join($this->table2 , 'tb_pelanggan.id_paket = tb_paket.id_paket');
    $this->db->where('tb_tagihan.id_pelanggan', $id);
    $this->db->order_by('id_tagihan', 'DESC');
    $this->db->limit(1);
    return $this->db->get();
}


public function count_tagihanBL($value='')
{
    $id = $this->session->userdata['id_pelanggan'];
    $this->db->select('*');
    $this->db->from($this->table3);
    $this->db->where('status', 'BL');
    $this->db->where('id_pelanggan', $id);
    return $this->db->get();
}

public function count_tagihanLS($value='')
{
    $id = $this->session->userdata['id_pelanggan'];
    $this->db->select('*');
    $this->db->from($this->table3);
    $this->db->where('status', 'LS');
    $this->db->where('id_pelanggan', $id);
    return $this->db->get();

}

//mengambil id konfirmasi urut terakhir
public function id_urut_konfirmasi($value='')
{ 
  $this->db->select_max('id_konfirmasi');
  $this->db->from ($this->konfirmasi);
}

public function add_konfirmasi_byr($SQLinsert){
    return $this -> db -> insert($this->konfirmasi, $SQLinsert);
}

}
