<?php 

/**
* 
*/
class M_tagihan_lain extends CI_model
{

private $table1 = 'tb_tagihan_lain';
private $table2 = 'tb_pelanggan';

//TAGIHAN LAIN INTERNET
public function view($value='')
{
  $this->db->select('*');
  $this->db->from($this->table1);
  $this->db->join($this->table2 , 'tb_tagihan_lain.id_pelanggan = tb_pelanggan.id_pelanggan');
  $this->db->order_by('id_tagihan_lain');
  return $this->db->get();
}

public function sendmail($value='')
{
  $this->db->select('*');
  $this->db->from($this->table1);
  $this->db->join($this->table2 , 'tb_tagihan_lain.id_pelanggan = tb_pelanggan.id_pelanggan');
  $this->db->where('status', 'BL');
  $this->db->order_by('id_tagihan_lain');
  return $this->db->get();
}

public function view_id($id='')
{
  $this->db->select('*');
  $this->db->from($this->table1);
  $this->db->join($this->table2 , 'tb_tagihan_lain.id_pelanggan = tb_pelanggan.id_pelanggan');
  $this->db->where('id_tagihan_lain', $id);
  return $this->db->get();
}

//mengambil id tagihan_lain urut terakhir
public function id_urut($value='')
{ 
  $this->db->select_max('id_tagihan_lain');
  $this->db->from ($this->table1);
}

public function add($SQLinsert){
  return $this -> db -> insert($this->table1, $SQLinsert);
}

public function update($id='',$SQLupdate){
  $this->db->where('id_tagihan_lain', $id);
  return $this->db-> update($this->table1, $SQLupdate);
}

public function delete($id=''){
  $this->db->where('id_tagihan_lain', $id);
  return $this->db-> delete($this->table1);
}

//untuk page pelanggan
public function tagihan($id='')
{
    //buka data tagihan lain berdasarkan id
    $id = $this->session->userdata['id_pelanggan'];
    $this->db->select('*');
    $this->db->from($this->table1);
    $this->db->where('id_pelanggan', $id);
    $this->db->order_by('id_tagihan_lain', 'DESC');
    return $this->db->get();
}

public function count_tagihanBL_lain($id='')
{
    //buka data tagihan lain berdasarkan id
    $id = $this->session->userdata['id_pelanggan'];
    $this->db->select('*');
    $this->db->from($this->table1);
    $this->db->where('id_pelanggan', $id);
    $this->db->where('status', 'BL');
    return $this->db->get();
}

}